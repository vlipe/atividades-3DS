package com.example.appbasickotlin

import android.widget.Toast
import androidx.compose.foundation.Image
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.foundation.text.KeyboardOptions
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.Lock
import androidx.compose.material.icons.filled.Person
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
import androidx.compose.ui.text.input.PasswordVisualTransformation
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import com.example.appbasickotlin.R
import com.google.firebase.auth.ktx.auth
import com.google.firebase.ktx.Firebase

@Composable
fun LoginScreen(onLogin: (String) -> Unit, onRegisterClick: () -> Unit) {
    var email by remember { mutableStateOf("") }
    var password by remember { mutableStateOf("") }
    val context = LocalContext.current
    val auth = Firebase.auth

    val aespaGradient = Brush.verticalGradient(
        colors = listOf(
            Color(0xFF020202),
            Color(0xFF111111),
            Color(0xFF181818)
        )
    )

    Box(
        modifier = Modifier
            .fillMaxSize()
            .background(brush = aespaGradient),
        contentAlignment = Alignment.Center
    ) {
        Card(
            modifier = Modifier
                .padding(16.dp)
                .fillMaxWidth(0.9f),
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
                    contentDescription = "aespa Logo",
                    modifier = Modifier
                        .height(100.dp)
                        .padding(bottom = 16.dp)
                )

                Text(
                    text = "aeShop",
                    style = MaterialTheme.typography.titleLarge,
                    color = Color.White
                )

                Spacer(modifier = Modifier.height(24.dp))

                OutlinedTextField(
                    value = email,
                    onValueChange = { email = it },
                    label = { Text("E-mail", color = Color.Gray, style = MaterialTheme.typography.labelLarge) },
                    leadingIcon = { Icon(Icons.Filled.Person, contentDescription = null, tint = Color(0xFF4FC97C)) },
                    modifier = Modifier.fillMaxWidth(),
                    colors = OutlinedTextFieldDefaults.colors(
                        focusedTextColor = Color.White,
                        unfocusedTextColor = Color.White,
                        focusedBorderColor = Color(0xFF4FC97C),
                        unfocusedBorderColor = Color.Gray
                    )
                )

                Spacer(modifier = Modifier.height(12.dp))

                OutlinedTextField(
                    value = password,
                    onValueChange = { password = it },
                    label = { Text("Senha", color = Color.Gray, style = MaterialTheme.typography.labelLarge,) },
                    leadingIcon = { Icon(Icons.Filled.Lock, contentDescription = null, tint = Color(0xFF4FC97C)) },
                    visualTransformation = PasswordVisualTransformation(),
                    keyboardOptions = KeyboardOptions(keyboardType = KeyboardType.Password),
                    modifier = Modifier.fillMaxWidth(),
                    colors = OutlinedTextFieldDefaults.colors(
                        focusedTextColor = Color.White,
                        unfocusedTextColor = Color.White,
                        focusedBorderColor = Color(0xFF4FC97C),
                        unfocusedBorderColor = Color.Gray
                    )
                )

                Spacer(modifier = Modifier.height(30.dp))

                Button(
                    onClick = {
                        if (email.isNotBlank() && password.isNotBlank()) {
                            auth.signInWithEmailAndPassword(email.trim(), password.trim())
                                .addOnSuccessListener {
                                    onLogin(email)
                                }
                                .addOnFailureListener {
                                    Toast.makeText(context, "Acesso Negado: Verifique seus dados", Toast.LENGTH_SHORT).show()
                                }
                        }
                    },
                    modifier = Modifier
                        .fillMaxWidth()
                        .height(50.dp),
                    shape = RoundedCornerShape(12.dp),
                    colors = ButtonDefaults.buttonColors(containerColor = Color(0xFF4FC97C)),
                ) {
                    Text(
                        text = "Entrar",
                        color = Color.Black,
                        style = MaterialTheme.typography.labelLarge,
                        fontWeight = FontWeight.Normal
                    )
                }

                Spacer(modifier = Modifier.height(16.dp))

                TextButton(onClick = { onRegisterClick() }) {
                    Text(
                        "Não tem uma conta? Cadastre-se",
                        color = Color(0xFF4FC97C),
                        fontSize = 12.sp,
                        fontWeight = FontWeight.Light,
                        style = MaterialTheme.typography.labelLarge
                    )
                }
            }
        }
    }
}