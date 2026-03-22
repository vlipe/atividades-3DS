package com.example.appbasickotlin

import android.widget.Toast
import androidx.compose.foundation.Image
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.foundation.text.KeyboardOptions
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.Info
import androidx.compose.material.icons.filled.List
import androidx.compose.material.icons.filled.ShoppingCart
import androidx.compose.material3.*
import androidx.compose.runtime.*
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Brush
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.text.input.KeyboardType
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import com.example.appbasickotlin.R
import com.google.firebase.firestore.ktx.firestore
import com.google.firebase.ktx.Firebase

@Composable
fun CadastrarProdutoScreen(onRegisterComplete: () -> Unit) {
    val db = Firebase.firestore
    val context = LocalContext.current

    var produtoInput by remember { mutableStateOf("") }
    var quantidadeInput by remember { mutableStateOf("") }
    var descricaoInput by remember { mutableStateOf("") }

    val aespaGradient = Brush.verticalGradient(
        colors = listOf(
            Color(0xFF020202),
            Color(0xFF111111),
            Color(0xFF181818)
        )
    )

    val accentColor = Color(0xFF4FC97C)

    Box(
        modifier = Modifier
            .fillMaxSize()
            .background(brush = aespaGradient),
        contentAlignment = Alignment.Center
    ) {
        Card(
            modifier = Modifier
                .padding(16.dp)
                .fillMaxWidth(0.9f)
                .wrapContentHeight(),
            shape = RoundedCornerShape(24.dp),
            colors = CardDefaults.cardColors(
                containerColor = Color.White.copy(alpha = 0.05f)
            ),
            elevation = CardDefaults.cardElevation(0.dp)
        ) {
            Column(
                horizontalAlignment = Alignment.CenterHorizontally,
                modifier = Modifier.padding(24.dp)
            ) {
                Image(
                    painter = painterResource(id = R.drawable.ic_logo),
                    contentDescription = "Logo",
                    modifier = Modifier
                        .height(100.dp)
                        .padding(bottom = 16.dp)
                )

                Text(
                    text = "Novo Item SYNK",
                    style = MaterialTheme.typography.titleLarge,
                    color = Color.White
                )

                Spacer(modifier = Modifier.height(24.dp))

                OutlinedTextField(
                    value = produtoInput,
                    onValueChange = { produtoInput = it },
                    label = { Text("Produto", color = Color.Gray, style = MaterialTheme.typography.labelLarge) },
                    leadingIcon = { Icon(Icons.Filled.ShoppingCart, contentDescription = null, tint = accentColor) },
                    modifier = Modifier.fillMaxWidth(),
                    colors = OutlinedTextFieldDefaults.colors(
                        focusedTextColor = Color.White,
                        unfocusedTextColor = Color.White,
                        focusedBorderColor = accentColor,
                        unfocusedBorderColor = Color.Gray
                    )
                )

                Spacer(modifier = Modifier.height(12.dp))

                OutlinedTextField(
                    value = quantidadeInput,
                    onValueChange = { quantidadeInput = it },
                    label = { Text("Quantidade", color = Color.Gray, style = MaterialTheme.typography.labelLarge) },
                    keyboardOptions = KeyboardOptions(keyboardType = KeyboardType.Number),
                    leadingIcon = { Icon(Icons.Filled.List, contentDescription = null, tint = accentColor) },
                    modifier = Modifier.fillMaxWidth(),
                    colors = OutlinedTextFieldDefaults.colors(
                        focusedTextColor = Color.White,
                        unfocusedTextColor = Color.White,
                        focusedBorderColor = accentColor,
                        unfocusedBorderColor = Color.Gray
                    )
                )

                Spacer(modifier = Modifier.height(12.dp))

                OutlinedTextField(
                    value = descricaoInput,
                    onValueChange = { descricaoInput = it },
                    label = { Text("Descrição", color = Color.Gray, style = MaterialTheme.typography.labelLarge) },
                    leadingIcon = { Icon(Icons.Filled.Info, contentDescription = null, tint = accentColor) },
                    modifier = Modifier.fillMaxWidth().height(100.dp),
                    maxLines = 4,
                    colors = OutlinedTextFieldDefaults.colors(
                        focusedTextColor = Color.White,
                        unfocusedTextColor = Color.White,
                        focusedBorderColor = accentColor,
                        unfocusedBorderColor = Color.Gray
                    )
                )

                Spacer(modifier = Modifier.height(30.dp))

                Button(
                    onClick = {
                        if (produtoInput.isNotBlank()) {
                            val novoProduto = hashMapOf(
                                "nome" to produtoInput,
                                "quantidade" to quantidadeInput,
                                "descricao" to descricaoInput
                            )

                            db.collection("produtos")
                                .add(novoProduto)
                                .addOnSuccessListener {
                                    Toast.makeText(context, "SYNK Sucedido!", Toast.LENGTH_SHORT).show()
                                    onRegisterComplete()
                                }
                                .addOnFailureListener { e ->
                                    Toast.makeText(context, "Erro: ${e.message}", Toast.LENGTH_LONG).show()
                                }
                        } else {
                            Toast.makeText(context, "Preencha o nome do produto!", Toast.LENGTH_SHORT).show()
                        }
                    },
                    modifier = Modifier.fillMaxWidth().height(50.dp),
                    shape = RoundedCornerShape(12.dp),
                    colors = ButtonDefaults.buttonColors(containerColor = accentColor)
                ) {
                    Text(
                        text = "Cadastrar",
                        color = Color.Black,
                        style = MaterialTheme.typography.labelLarge,
                        fontWeight = FontWeight.Normal
                    )
                }

                Spacer(modifier = Modifier.height(16.dp))

                TextButton(onClick = { onRegisterComplete() }) {
                    Text(
                        "Voltar para a Navegação",
                        color = accentColor,
                        style = MaterialTheme.typography.labelLarge,
                        fontWeight = FontWeight.Normal,
                        fontSize = 12.sp
                    )
                }
            }
        }
    }
}