package com.example.appbasickotlin

import android.widget.Toast
import androidx.compose.foundation.Image
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.foundation.text.KeyboardOptions
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.Email
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
import com.google.firebase.firestore.ktx.firestore
import com.google.firebase.ktx.Firebase

@Composable
fun RegisterScreen(onRegisterComplete: () -> Unit) {

    var name by remember { mutableStateOf("") }
    var email by remember { mutableStateOf("") }
    var password by remember { mutableStateOf("") }
    var confirmPassword by remember { mutableStateOf("") }

    val auth = Firebase.auth
    val db = Firebase.firestore
    val context = LocalContext.current

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
                        .height(80.dp)
                        .padding(bottom = 16.dp)
                )

                Text(
                    text = "Crie uma conta",
                    style = MaterialTheme.typography.titleLarge,
                    fontSize = 20.sp,
                    color = Color.White
                )

                Spacer(modifier = Modifier.height(20.dp))

                OutlinedTextField(
                    value = name,
                    onValueChange = { name = it },
                    label = { Text("Nome", color = Color.Gray, style = MaterialTheme.typography.labelLarge) },
                    leadingIcon = { Icon(Icons.Filled.Person, contentDescription = null, tint = accentColor) },
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
                    value = email,
                    onValueChange = { email = it },
                    label = { Text("ae-mail", color = Color.Gray, style = MaterialTheme.typography.labelLarge) },
                    leadingIcon = { Icon(Icons.Filled.Email, contentDescription = null, tint = accentColor) },
                    keyboardOptions = KeyboardOptions(keyboardType = KeyboardType.Email),
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
                    value = password,
                    onValueChange = { password = it },
                    label = { Text("Senha", color = Color.Gray, style = MaterialTheme.typography.labelLarge) },
                    leadingIcon = { Icon(Icons.Filled.Lock, contentDescription = null, tint = accentColor) },
                    visualTransformation = PasswordVisualTransformation(),
                    keyboardOptions = KeyboardOptions(keyboardType = KeyboardType.Password),
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
                    value = confirmPassword,
                    onValueChange = { confirmPassword = it },
                    label = { Text("Confirmar Senha", color = Color.Gray, style = MaterialTheme.typography.labelLarge) },
                    leadingIcon = { Icon(Icons.Filled.Lock, contentDescription = null, tint = accentColor) },
                    visualTransformation = PasswordVisualTransformation(),
                    modifier = Modifier.fillMaxWidth(),
                    colors = OutlinedTextFieldDefaults.colors(
                        focusedTextColor = Color.White,
                        unfocusedTextColor = Color.White,
                        focusedBorderColor = accentColor,
                        unfocusedBorderColor = Color.Gray
                    )
                )

                Spacer(modifier = Modifier.height(24.dp))

                Button(
                    onClick = {
                        if (name.isNotBlank() && email.isNotBlank() && password.isNotBlank()) {
                            if (password == confirmPassword) {
                                auth.createUserWithEmailAndPassword(email.trim(), password.trim())
                                    .addOnSuccessListener { result ->
                                        val uid = result.user?.uid
                                        if (uid != null) {
                                            val dadosUsuario = hashMapOf<String, Any>("nome" to name)
                                            db.collection("usuarios").document(uid).set(dadosUsuario)
                                                .addOnSuccessListener {
                                                    Toast.makeText(context, "Conexão Estabelecida!", Toast.LENGTH_SHORT).show()
                                                    onRegisterComplete()
                                                }
                                                .addOnFailureListener {
                                                    Toast.makeText(context, "Erro ao salvar perfil", Toast.LENGTH_SHORT).show()
                                                }
                                        }
                                    }
                                    .addOnFailureListener { e ->
                                        Toast.makeText(context, "Erro: ${e.message}", Toast.LENGTH_LONG).show()
                                    }
                            } else {
                                Toast.makeText(context, "Senhas não conferem", Toast.LENGTH_SHORT).show()
                            }
                        } else {
                            Toast.makeText(context, "Preencha todos os campos", Toast.LENGTH_SHORT).show()
                        }
                    },
                    modifier = Modifier
                        .fillMaxWidth()
                        .height(50.dp),
                    shape = RoundedCornerShape(12.dp),
                    colors = ButtonDefaults.buttonColors(containerColor = accentColor)
                ) {
                    Text("Cadastrar", color = Color.Black, fontWeight = FontWeight.Normal)
                }

                Spacer(modifier = Modifier.height(12.dp))

                TextButton(onClick = { onRegisterComplete() }) {
                    Text(
                        "Já tem uma conta? Faça Login",
                        color = accentColor,
                        fontSize = 12.sp,
                        fontWeight = FontWeight.Normal,
                        style = MaterialTheme.typography.labelLarge
                    )
                }
            }
        }
    }
}