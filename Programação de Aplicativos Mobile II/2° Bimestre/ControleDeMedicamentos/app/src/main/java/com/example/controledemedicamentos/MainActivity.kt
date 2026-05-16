package com.example.controledemedicamentos

import android.os.Bundle
import android.util.Log
import androidx.activity.ComponentActivity
import androidx.activity.compose.setContent
import androidx.compose.foundation.Image
import androidx.compose.foundation.layout.Arrangement
import androidx.compose.foundation.layout.Column
import androidx.compose.foundation.layout.Row
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.height
import androidx.compose.foundation.layout.width
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.material3.ButtonColors
import androidx.compose.material3.ButtonDefaults
import androidx.compose.material3.ElevatedButton
import androidx.compose.material3.MaterialTheme
import androidx.compose.material3.Surface
import androidx.compose.material3.Text
import androidx.compose.material3.TextField
import androidx.compose.runtime.Composable
import androidx.compose.runtime.getValue
import androidx.compose.runtime.mutableStateOf
import androidx.compose.runtime.remember
import androidx.compose.runtime.setValue
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.layout.ContentScale
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.tooling.preview.Preview
import androidx.compose.ui.unit.dp
import com.example.controledemedicamentos.ui.theme.ControleDeMedicamentosTheme

const val TAG = "MedControl"

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
    var nomeRemedio by remember { mutableStateOf("") }
    var horaInicial by remember { mutableStateOf("") }
    var resultadoHorarios by remember { mutableStateOf("") }

    Surface(
        modifier = Modifier.fillMaxSize(),
        color = MaterialTheme.colorScheme.background
    ) {
        Column(
            verticalArrangement = Arrangement.SpaceEvenly,
            horizontalAlignment = Alignment.CenterHorizontally
        ) {

            val image = painterResource(R.drawable.logo)
            Image(
                painter = image,
                contentDescription = "Ícone do Aplicativo",
                contentScale = ContentScale.Fit,
                modifier = Modifier
                    .width(130.dp)
                    .height(130.dp)
            )

            Greeting("Controle de Horários")

            Column(
                modifier = Modifier.fillMaxWidth(),
                horizontalAlignment = Alignment.CenterHorizontally,
                verticalArrangement = Arrangement.spacedBy(12.dp)
            ) {
                TextField(
                    value = nomeRemedio,
                    onValueChange = { nomeRemedio = it },
                    label = { Text("Nome do Medicamento") },
                    modifier = Modifier.fillMaxWidth(0.8f),
                    singleLine = true
                )

                TextField(
                    value = horaInicial,
                    onValueChange = { horaInicial = it },
                    label = { Text("Hora da Primeira Dose (0-23)") },
                    modifier = Modifier.fillMaxWidth(0.8f),
                    singleLine = true
                )
            }

            Column(
                modifier = Modifier.fillMaxWidth(),
                horizontalAlignment = Alignment.CenterHorizontally,
                verticalArrangement = Arrangement.spacedBy(10.dp)
            ) {
                ActionButton(
                    text = "De 6 em 6 horas (4x ao dia)",
                    modifier = Modifier.fillMaxWidth(0.75f)
                ) {
                    resultadoHorarios = calcularHorarios(nomeRemedio, horaInicial, 6)
                }

                ActionButton(
                    text = "De 8 em 8 horas (3x ao dia)",
                    modifier = Modifier.fillMaxWidth(0.75f)
                ) {
                    resultadoHorarios = calcularHorarios(nomeRemedio, horaInicial, 8)
                }

                ActionButton(
                    text = "De 12 em 12 horas (2x ao dia)",
                    modifier = Modifier.fillMaxWidth(0.75f)
                ) {
                    resultadoHorarios = calcularHorarios(nomeRemedio, horaInicial, 12)
                }
            }

            Surface(
                modifier = Modifier
                    .fillMaxWidth(0.8f)
                    .height(80.dp),
                color = MaterialTheme.colorScheme.surfaceVariant,
                shape = RoundedCornerShape(8.dp)
            ) {
                Column(
                    verticalArrangement = Arrangement.Center,
                    horizontalAlignment = Alignment.CenterHorizontally
                ) {
                    Text(
                        text = resultadoHorarios.ifEmpty { "Aguardando cálculo..." },
                        style = MaterialTheme.typography.bodyLarge.copy(fontWeight = FontWeight.Bold),
                        color = if (resultadoHorarios.startsWith("Por favor")) MaterialTheme.colorScheme.error else MaterialTheme.colorScheme.onSurfaceVariant,
                        modifier = Modifier.fillMaxWidth(0.9f)
                    )
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

    val resultado = "Horários para $nome: ${listaHorarios.joinToString(", ")}"
    Log.i(TAG, "Sucesso: $resultado")

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

@Preview(showBackground = true)
@Composable
fun AppPreview() {
    ControleDeMedicamentosTheme {
        App()
    }
}