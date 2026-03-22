@file:OptIn(ExperimentalMaterial3Api::class)

package com.example.appbasickotlin

import android.widget.Toast
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.*
import androidx.compose.foundation.lazy.LazyColumn
import androidx.compose.foundation.lazy.items
import androidx.compose.foundation.shape.RoundedCornerShape
import androidx.compose.material.icons.Icons
import androidx.compose.material.icons.filled.ArrowBack
import androidx.compose.material.icons.filled.Delete
import androidx.compose.material.icons.filled.ShoppingCart
import androidx.compose.material3.*
import androidx.compose.runtime.*
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Brush
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.text.font.FontWeight
import androidx.compose.ui.unit.dp
import androidx.compose.ui.unit.sp
import com.google.firebase.firestore.ktx.firestore
import com.google.firebase.ktx.Firebase

data class ProdutoFirebase(
    val id: String = "",
    val nome: String = "",
    val quantidade: String = "",
    val descricao: String = ""
)

@Composable
fun ListarProdutosScreen(onBack: () -> Unit) {
    val db = Firebase.firestore
    val context = LocalContext.current
    var produtos by remember { mutableStateOf(listOf<ProdutoFirebase>()) }

    val accentColor = Color(0xFF4FC97C)
    val aespaGradient = Brush.verticalGradient(
        colors = listOf(
            Color(0xFF020202),
            Color(0xFF111111),
            Color(0xFF181818)
        )
    )

    LaunchedEffect(Unit) {
        db.collection("produtos").addSnapshotListener { value, error ->
            if (error != null) return@addSnapshotListener
            if (value != null) {
                produtos = value.map { doc ->
                    ProdutoFirebase(
                        id = doc.id,
                        nome = doc.getString("nome") ?: "",
                        quantidade = doc.getString("quantidade") ?: "",
                        descricao = doc.getString("descricao") ?: ""
                    )
                }
            }
        }
    }

    Scaffold(
        topBar = {
            TopAppBar(
                title = {
                    Text(
                        "SYNK INVENTORY",
                        style = MaterialTheme.typography.titleLarge,
                        color = Color.White
                    )
                },
                navigationIcon = {
                    IconButton(onClick = onBack) {
                        Icon(Icons.Filled.ArrowBack, contentDescription = "Voltar", tint = accentColor)
                    }
                },
                colors = TopAppBarDefaults.topAppBarColors(
                    containerColor = Color(0xFF020202)
                )
            )
        }
    ) { innerPadding ->
        Box(
            modifier = Modifier
                .fillMaxSize()
                .background(brush = aespaGradient)
                .padding(innerPadding)
        ) {
            LazyColumn(
                modifier = Modifier.fillMaxSize(),
                contentPadding = PaddingValues(16.dp)
            ) {
                items(produtos) { produto ->
                    Card(
                        shape = RoundedCornerShape(16.dp),
                        colors = CardDefaults.cardColors(
                            containerColor = Color.White.copy(alpha = 0.05f)
                        ),
                        modifier = Modifier
                            .fillMaxWidth()
                            .padding(vertical = 8.dp),
                        elevation = CardDefaults.cardElevation(0.dp)
                    ) {
                        Row(
                            verticalAlignment = Alignment.CenterVertically,
                            modifier = Modifier.padding(16.dp)
                        ) {
                            Icon(
                                imageVector = Icons.Filled.ShoppingCart,
                                contentDescription = null,
                                tint = accentColor,
                                modifier = Modifier.size(32.dp)
                            )

                            Spacer(modifier = Modifier.width(16.dp))

                            Column(Modifier.weight(1f)) {
                                Text(
                                    text = produto.nome,
                                    color = Color.White,
                                    style = MaterialTheme.typography.labelLarge,
                                    fontWeight = FontWeight.Bold
                                )
                                Text(
                                    text = "Qtd: ${produto.quantidade}",
                                    color = accentColor,
                                    style = MaterialTheme.typography.labelLarge
                                )
                                if (produto.descricao.isNotEmpty()) {
                                    Text(
                                        text = produto.descricao,
                                        color = Color.Gray,
                                        style = MaterialTheme.typography.bodySmall
                                    )
                                }
                            }

                            IconButton(onClick = {
                                db.collection("produtos").document(produto.id).delete()
                                    .addOnSuccessListener {
                                        Toast.makeText(context, "Item removido do SYNK", Toast.LENGTH_SHORT).show()
                                    }
                            }) {
                                Icon(
                                    Icons.Filled.Delete,
                                    contentDescription = "Excluir",
                                    tint = Color(0xFFFF5252)
                                )
                            }
                        }
                    }
                }
            }
        }
    }
}