
### Avaliador Musical
> Este é um projeto educacional desenvolvido em **Android Jetpack Compose**. O objetivo principal é demonstrar como capturar entradas do usuário via `TextField`, gerenciar estados com `mutableStateOf` e interagir com o **Logcat** utilizando diferentes níveis de severidade (Error, Warning, Debug e Info).

### Funcionalidades

* **Entrada Dinâmica:** O usuário pode digitar o nome de um álbum ou artista.
* **Avaliação por Estrelas:** Quatro botões personalizados que representam diferentes notas.
* **Feedback via Logcat:** Cada botão dispara uma mensagem formatada no console de depuração do Android Studio.
* **UI Moderna:** Utiliza componentes Material Design 3, incluindo `ElevatedButton` e `Surface`.

### Tecnologias Utilizadas

* **Kotlin**: Linguagem principal.
* **Jetpack Compose**: Toolkit moderno para construção de UI nativa.
* **Material 3**: Sistema de design mais recente do Google.
* **Log.util**: Biblioteca nativa do Android para monitoramento de eventos.

---

### Estrutura do Código

O coração do aplicativo reside na função composable `App()`, que organiza os elementos em uma `Column`.

### Gerenciamento de Estado
Utilizamos o `remember { mutableStateOf("") }` para garantir que o texto digitado pelo usuário seja preservado durante a recomposição da interface:
```kotlin
var albumNome by remember { mutableStateOf("") }
```

### Níveis de Logcat
O projeto explora a diferenciação visual e funcional dos logs:

| Botão | Nível de Log | Função Utilizada |
| :--- | :--- | :--- |
| ⭐ (Ruim) | **Error** | `Log.e(TAG, ...)` |
| ⭐⭐ (Regular) | **Warning** | `Log.w(TAG, ...)` |
| ⭐⭐⭐ (Bom) | **Debug** | `Log.d(TAG, ...)` |
| ⭐⭐⭐⭐ (Perfeito!) | **Info** | `Log.i(TAG, ...)` |

---

### Personalização de Componentes

Para manter o código limpo (princípio DRY - *Don't Repeat Yourself*), foi criado um componente customizado chamado `ActionButton`:

```kotlin
@Composable
fun ActionButton(
    text: String,
    buttonColors: ButtonColors,
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
```

### Como testar

1. Clone este repositório.
2. Abra no **Android Studio**.
3. Execute o aplicativo em um emulador ou dispositivo físico.
4. Abra a aba **Logcat** na parte inferior do Android Studio.
5. No campo de busca do Logcat, digite `tag:Avaliador Musical` para filtrar apenas as mensagens deste app.
6. Digite o nome de uma banda, clique em uma estrela e veja o log aparecer!

### Capturas de Tela do Projeto

<div align="center">
  <img src="https://raw.githubusercontent.com/vlipe/atividades-3DS/2861b10e3e0b19fe78486055b8ce185d585c9dc8/Programa%C3%A7%C3%A3o%20de%20Aplicativos%20Mobile%20II/1%C2%B0%20Bimestre/LogcatButton/print-1.png" width="200px" alt="Screenshot do Aplicativo">
  <img src="https://raw.githubusercontent.com/vlipe/atividades-3DS/2861b10e3e0b19fe78486055b8ce185d585c9dc8/Programa%C3%A7%C3%A3o%20de%20Aplicativos%20Mobile%20II/1%C2%B0%20Bimestre/LogcatButton/print-2.png" width="200px" alt="Screenshot do Aplicativo">
</div>
