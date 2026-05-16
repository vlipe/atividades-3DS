# Controle de Medicamentos - Lógica de Horários
> O Controle de Medicamentos é um aplicativo Android nativo desenvolvido em Kotlin utilizando o framework moderno Jetpack Compose. O objetivo principal do projeto é aplicar conceitos de gerenciamento de estado (State Management) e lógica de negócios para calcular e exibir de forma automatizada os horários subsequentes de administração de medicamentos com base em uma hora inicial fornecida pelo usuário.

<br>

O sistema valida as entradas de dados e oferece três opções de intervalos comuns de tratamento:

- 6 em 6 horas (4 doses diárias)
- 8 em 8 horas (3 doses diárias)
- 12 em 12 horas (2 doses diárias)

<br>

### Tecnologias Utilizadas

**Linguagem**: Kotlin
**UI Framework**: Jetpack Compose (Declarative UI)
**Design System**: Material Design 3
**Logs & Depuração**: Android Logcat (android.util.Log)
**Gerenciamento de Estado**: remember e mutableStateOf

<br>

### Demonstração da Execução

<img src="https://github.com/vlipe/atividades-3DS/blob/d4ea86eda2c33f94428f8ee4c70b4c222d1cfd37/Programa%C3%A7%C3%A3o%20de%20Aplicativos%20Mobile%20II/2%C2%B0%20Bimestre/ControleDeMedicamentos/print-execucao.jpeg" width=250px>

<br>

### Lógica e Regras de Negócio
O núcleo do aplicativo reside na função de cálculo de horários, que utiliza o operador de resto de divisão (% 24) para tratar a virada de dia (sistema de 24 horas) de forma puramente matemática:

- **Validação de Nulidade e Escopo**: O aplicativo impede o processamento se o campo de texto estiver em branco ou se o valor numérico da hora estiver fora do intervalo de 0 a 23.
- **Smart Casting**: Utilização das diretrizes de Null Safety do Kotlin para garantir a integridade dos dados antes da manipulação de variáveis nulas (Int?).
- **Saída Dupla**: O resultado estruturado é renderizado dinamicamente em um container na interface do usuário (UI) e simultaneamente enviado ao Logcat sob a Tag "MedControl" para fins de avaliação e auditoria de fluxo de dados.

<br>

### Como Executar o Projeto

1. Faça o clone deste repositório ou copie os arquivos fonte.
2. Abra o projeto no Android Studio.
3. Execute o comando Build > Clean Project e, em seguida, pressione Run para instalar no emulador ou dispositivo físico.
