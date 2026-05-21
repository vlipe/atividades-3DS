package com.example.controledemedicamentos

import android.content.Context
import android.os.Bundle
import android.util.Log
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.Image
import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.padding
import androidx.compose.foundation.layout.width
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.foundation.lazy.items
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.material3.ButtonColors
import androidx.compose.material3.ButtonDefaults
import androidx.compose.material3.Card
import androidx.compose.material3.CardDefaults
import androidx.compose.material3.ElevatedButton
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.Surface
import androidx.compose.material3.Text
import androidx.compose.material3.TextField
import androidx.compose.runtime.Composable
import androidx.compose.runtime.LaunchedEffect
import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.rememberCoroutineScope
import androidx.compose.runtime.setValue
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.layout.ContentScale
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import com.example.controledemedicamentos.ui.theme.ControleDeMedicamentosTheme
import androidx.room.Dao
import androidx.room.Database
import androidx.room.Entity
import androidx.room.Insert
import androidx.room.PrimaryKey
import androidx.room.Query
import androidx.room.Room
import androidx.room.RoomDatabase
import kotlinx.coroutines.Dispatchers
import kotlinx.coroutines.launch
import kotlinx.coroutines.withContext

const val TAG = "MedControl"

@Entity(tableName = "medicamentos")
data class Medicamento(
    @PrimaryKey(autoGenerate = true) val id: Int = 0,
    val nome: String,
    val horarios: String
)

@Dao
interface MedicamentoDao {
    @Query("SELECT * FROM medicamentos ORDER BY id DESC")
    suspend fun obterTodos(): List<Medicamento>

    @Insert
    suspend fun inserir(medicamento: Medicamento)
}

@Database(entities = [Medicamento::class], version = 1)
abstract class AppDatabase : RoomDatabase() {
    abstract fun medicamentoDao(): MedicamentoDao

    companion object {
        @Volatile
        private var INSTANCE: AppDatabase? = null

        fun getDatabase(context: Context): AppDatabase {
            return INSTANCE ?: synchronized(this) {
                val instance = Room.databaseBuilder(
                    context.applicationContext,
                    AppDatabase::class.java,
                    "medicamentos_db"
                ).build()
                INSTANCE = instance
                instance
            }
        }
    }
}

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            ControleDeMedicamentosTheme {
                App()
            }
        }
    }
}

@Composable
private fun App() {
    val context = LocalContext.current
    val db = remember { AppDatabase.getDatabase(context) }
    val coroutineScope = rememberCoroutineScope()

    var nomeRemedio by remember { mutableStateOf("") }
    var horaInicial by remember { mutableStateOf("") }
    var resultadoHorarios by remember { mutableStateOf("") }
    var listaHistorico by remember { mutableStateOf(listOf<Medicamento>()) }

    LaunchedEffect(Unit) {
        coroutineScope.launch(Dispatchers.IO) {
            val dados = db.medicamentoDao().obterTodos()
            withContext(Dispatchers.Main) {
                listaHistorico = dados
            }
        }
    }

    Surface(
        modifier = Modifier.fillMaxSize(),
        color = MaterialTheme.colorScheme.background
    ) {
        Column(
            verticalArrangement = Arrangement.spacedBy(16.dp),
            horizontalAlignment = Alignment.CenterHorizontally,
            modifier = Modifier.padding(16.dp)
        ) {

            val image = painterResource(R.drawable.logo)
            Image(
                painter = image,
                contentDescription = "Ícone do Aplicativo",
                contentScale = ContentScale.Fit,
                modifier = Modifier
                    .width(100.dp)
                    .height(100.dp)
            )

            Greeting("Controle de Horários")

            Column(
                modifier = Modifier.fillMaxWidth(),
                horizontalAlignment = Alignment.CenterHorizontally,
                verticalArrangement = Arrangement.spacedBy(8.dp)
            ) {
                TextField(
                    value = nomeRemedio,
                    onValueChange = { nomeRemedio = it },
                    label = { Text("Nome do Medicamento") },
                    modifier = Modifier.fillMaxWidth(0.9f),
                    singleLine = true
                )

                TextField(
                    value = horaInicial,
                    onValueChange = { horaInicial = it },
                    label = { Text("Hora da Primeira Dose (0-23)") },
                    modifier = Modifier.fillMaxWidth(0.9f),
                    singleLine = true
                )
            }

            Column(
                modifier = Modifier.fillMaxWidth(),
                horizontalAlignment = Alignment.CenterHorizontally,
                verticalArrangement = Arrangement.spacedBy(8.dp)
            ) {
                ActionButton(
                    text = "De 6 em 6 horas (4x ao dia)",
                    modifier = Modifier.fillMaxWidth(0.85f)
                ) {
                    resultadoHorarios = calcularHorarios(nomeRemedio, horaInicial, 6)
                    if (!resultadoHorarios.startsWith("Por favor")) {
                        coroutineScope.launch(Dispatchers.IO) {
                            db.medicamentoDao().inserir(Medicamento(nome = nomeRemedio, horarios = resultadoHorarios))
                            val atualizado = db.medicamentoDao().obterTodos()
                            withContext(Dispatchers.Main) { listaHistorico = atualizado }
                        }
                    }
                }

                ActionButton(
                    text = "De 8 em 8 horas (3x ao dia)",
                    modifier = Modifier.fillMaxWidth(0.85f)
                ) {
                    resultadoHorarios = calcularHorarios(nomeRemedio, horaInicial, 8)
                    if (!resultadoHorarios.startsWith("Por favor")) {
                        coroutineScope.launch(Dispatchers.IO) {
                            db.medicamentoDao().inserir(Medicamento(nome = nomeRemedio, horarios = resultadoHorarios))
                            val atualizado = db.medicamentoDao().obterTodos()
                            withContext(Dispatchers.Main) { listaHistorico = atualizado }
                        }
                    }
                }

                ActionButton(
                    text = "De 12 em 12 horas (2x ao dia)",
                    modifier = Modifier.fillMaxWidth(0.85f)
                ) {
                    resultadoHorarios = calcularHorarios(nomeRemedio, horaInicial, 12)
                    if (!resultadoHorarios.startsWith("Por favor")) {
                        coroutineScope.launch(Dispatchers.IO) {
                            db.medicamentoDao().inserir(Medicamento(nome = nomeRemedio, horarios = resultadoHorarios))
                            val atualizado = db.medicamentoDao().obterTodos()
                            withContext(Dispatchers.Main) { listaHistorico = atualizado }
                        }
                    }
                }
            }

            Surface(
                modifier = Modifier
                    .fillMaxWidth(0.9f)
                    .height(65.dp),
                color = MaterialTheme.colorScheme.surfaceVariant,
                shape = RoundedCornerShape(8.dp)
            ) {
                Column(
                    verticalArrangement = Arrangement.Center,
                    horizontalAlignment = Alignment.CenterHorizontally
                ) {
                    Text(
                        text = resultadoHorarios.ifEmpty { "Aguardando cálculo..." },
                        style = MaterialTheme.typography.bodyMedium.copy(fontWeight = FontWeight.Bold),
                        color = if (resultadoHorarios.startsWith("Por favor")) MaterialTheme.colorScheme.error else MaterialTheme.colorScheme.onSurfaceVariant,
                        modifier = Modifier.fillMaxWidth(0.9f)
                    )
                }
            }

            Text(
                text = "Histórico no Banco de Dados:",
                style = MaterialTheme.typography.titleSmall.copy(fontWeight = FontWeight.Bold),
                color = MaterialTheme.colorScheme.primary,
                modifier = Modifier
                    .fillMaxWidth(0.9f)
                    .padding(top = 8.dp)
            )

            LazyColumn(
                modifier = Modifier.fillMaxWidth(0.9f),
                verticalArrangement = Arrangement.spacedBy(8.dp)
            ) {
                items(listaHistorico) { med ->
                    Card(
                        modifier = Modifier.fillMaxWidth(),
                        colors = CardDefaults.cardColors(containerColor = MaterialTheme.colorScheme.surfaceVariant)
                    ) {
                        Column(modifier = Modifier.padding(12.dp)) {
                            Text(text = med.nome, fontWeight = FontWeight.Bold, style = MaterialTheme.typography.bodyLarge)
                            Text(text = med.horarios, style = MaterialTheme.typography.bodySmall, color = MaterialTheme.colorScheme.secondary)
                        }
                    }
                }
            }
        }
    }
}

fun calcularHorarios(nome: String, horaStr: String, intervalo: Int): String {
    val horaInt = horaStr.toIntOrNull()

    if (nome.isBlank() || horaInt == null || horaInt !in 0..23) {
        Log.e(TAG, "Erro: Nome vazio ou hora inválida.")
        return "Por favor, insira um nome e uma hora válida (0 a 23)."
    }

    val listaHorarios = mutableListOf<String>()
    var horaAtual: Int = horaInt

    val totalDoses = 24 / intervalo
    for (i in 0 until totalDoses) {
        listaHorarios.add(String.format("%02dh", horaAtual))
        horaAtual = (horaAtual + intervalo) % 24
    }

    val resultado = "${listaHorarios.joinToString(", ")}"
    Log.i(TAG, "Sucesso: Horários para $nome: $resultado")

    return resultado
}

@Composable
fun ActionButton(
    text: String,
    buttonColors: ButtonColors = ButtonDefaults.buttonColors(),
    modifier: Modifier = Modifier,
    block: () -> Unit
) {
    ElevatedButton(
        onClick = block,
        shape = RoundedCornerShape(12.dp),
        colors = buttonColors,
        modifier = modifier
    ) {
        Text(text = text, fontWeight = FontWeight.Bold)
    }
}

@Composable
fun Greeting(name: String) {
    Text(
        text = name,
        style = MaterialTheme.typography.headlineMedium.copy(
            fontWeight = FontWeight.ExtraBold
        ),
        color = MaterialTheme.colorScheme.primary
    )
}