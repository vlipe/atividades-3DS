package com.example.logcatbutton

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
import com.example.logcatbutton.ui.theme.DebugButtonColors
import com.example.logcatbutton.ui.theme.ErrorButtonColors
import com.example.logcatbutton.ui.theme.InfoButtonColors
import com.example.logcatbutton.ui.theme.LogcatButtonTheme
import com.example.logcatbutton.ui.theme.WarningButtonColors

const val TAG = "Avaliador Musical"

class MainActivity : ComponentActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContent {
            LogcatButtonTheme {
                App()
            }
        }
    }
}

@Composable
private fun App() {
    var albumNome by remember { mutableStateOf("") }

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
                contentDescription = "Capa do Álbum",
                contentScale = ContentScale.Fit,
                modifier = Modifier
                    .width(200.dp)
                    .height(200.dp)
            )

            Greeting(TAG)

            Row(
                Modifier.fillMaxWidth(),
                Arrangement.Center
            ) {
                TextField(
                    value = albumNome,
                    onValueChange = { albumNome = it },
                    label = { Text("Nome do Álbum/Artista:") },
                )
            }

            ActionButton(
                text = "⭐ (Ruim)",
                buttonColors = ErrorButtonColors(),
                modifier = Modifier.fillMaxWidth(0.6f)
            ) {
                Log.e(TAG, "Avaliação: $albumNome - Nota 1")
            }

            ActionButton(
                text = "⭐⭐ (Regular)",
                buttonColors = WarningButtonColors(),
                modifier = Modifier.fillMaxWidth(0.6f)
            ) {
                Log.w(TAG, "Avaliação: $albumNome - Nota 2")
            }

            ActionButton(
                text = "⭐⭐⭐ (Bom)",
                buttonColors = DebugButtonColors(),
                modifier = Modifier.fillMaxWidth(0.6f)
            ) {
                Log.d(TAG, "Avaliação: $albumNome - Nota 3")
            }

            ActionButton(
                text = "⭐⭐⭐⭐ (Perfeito!)",
                buttonColors = InfoButtonColors(),
                modifier = Modifier.fillMaxWidth(0.6f)
            ) {
                Log.i(TAG, "Avaliação: $albumNome - Nota 4")
            }
        }
    }
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
    LogcatButtonTheme {
        App()
    }
}