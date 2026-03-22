package com.example.appbasickotlin

import androidx.compose.foundation.Image
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.MoreVert
import androidx.compose.material3.*
import androidx.compose.runtime.*
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Brush
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.res.painterResource
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.text.style.TextAlign
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import com.example.appbasickotlin.R
import com.google.firebase.auth.ktx.auth
import com.google.firebase.firestore.ktx.firestore
import com.google.firebase.ktx.Firebase

@Composable
fun HomeScreen(
    userName: String = "Usuário",
    onCadastrarProduto: () -> Unit,
    onListarProdutos: () -> Unit,
    onLogout: () -> Unit
) {
    var menuExpanded by remember { mutableStateOf(false) }
    var nomeReal by remember { mutableStateOf("") }

    val auth = Firebase.auth
    val db = Firebase.firestore
    val accentColor = Color(0xFF4FC97C)

    LaunchedEffect(Unit) {
        val userId = auth.currentUser?.uid
        if (userId != null) {
            db.collection("usuarios").document(userId).get().addOnSuccessListener { doc ->
                nomeReal = doc.getString("nome") ?: "ae-Member"
            }
        }
    }

    val aespaGradient = Brush.verticalGradient(
        colors = listOf(Color(0xFF020202), Color(0xFF111111), Color(0xFF181818))
    )

    Box(
        modifier = Modifier.fillMaxSize().background(brush = aespaGradient),
        contentAlignment = Alignment.TopCenter
    ) {

        Column(horizontalAlignment = Alignment.End, modifier = Modifier.fillMaxWidth().padding(16.dp)) {
            Box {
                IconButton(onClick = { menuExpanded = true }) {
                    Icon(Icons.Default.MoreVert, contentDescription = "Menu", tint = accentColor)
                }
                DropdownMenu(expanded = menuExpanded, onDismissRequest = { menuExpanded = false }) {
                    DropdownMenuItem(text = { Text("Cadastrar Produto") }, onClick = { menuExpanded = false; onCadastrarProduto() })
                    DropdownMenuItem(text = { Text("Listar Produtos") }, onClick = { menuExpanded = false; onListarProdutos() })
                    Divider()
                    DropdownMenuItem(text = { Text("Deslogar") }, onClick = { menuExpanded = false; onLogout() })
                }
            }
        }

        Card(
            modifier = Modifier.padding(top = 100.dp, bottom = 40.dp).fillMaxWidth(0.9f).fillMaxHeight(0.7f),
            shape = RoundedCornerShape(24.dp),
            colors = CardDefaults.cardColors(containerColor = Color.White.copy(alpha = 0.05f)),
            elevation = CardDefaults.cardElevation(0.dp)
        ) {
            Column(
                horizontalAlignment = Alignment.CenterHorizontally,
                verticalArrangement = Arrangement.Center,
                modifier = Modifier.padding(24.dp).fillMaxSize()
            ) {
                Image(
                    painter = painterResource(id = R.drawable.ic_logo),
                    contentDescription = "Logo",
                    modifier = Modifier.height(120.dp).padding(bottom = 24.dp)
                )

                Text(
                    text = if (nomeReal.isNotEmpty()) "Bem-vindo, $nomeReal!" else "Conectando ao SYNK...",
                    fontSize = 26.sp,
                    fontWeight = FontWeight.ExtraBold,
                    color = accentColor,
                    textAlign = TextAlign.Center
                )

                Spacer(modifier = Modifier.height(12.dp))

                Text(
                    text = "Acesso autorizado à interface aeShop.",
                    fontSize = 14.sp,
                    color = Color.Gray,
                    textAlign = TextAlign.Center
                )
            }
        }
    }
}