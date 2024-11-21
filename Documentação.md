# Documentação do Projeto - Descubra Seu Signo

## Descrição do Projeto

Este projeto permite que os usuários descubram seu signo zodiacal com base na data de nascimento informada. Utiliza **PHP**, **XML**, **HTML5**, **CSS3** (com **Bootstrap**) e a biblioteca **Flatpickr** para fornecer uma interface responsiva e amigável tanto para computadores quanto para dispositivos móveis.

## Estrutura do Projeto

```plaintext
Project/
├── assets/
│   ├── CSS/
│   │   └── style.css
│   ├── imgs/
│   │   └── background.jpg
├── layouts/
│   └── header.php
├── contato.php
├── index.php
├── show_zodiac_sign.php
├── signos.xml
└── sobre.php
```

## Descrição dos Arquivos

- **assets/CSS/style.css**: Arquivo de estilos personalizados para o projeto.
- **assets/imgs/background.jpg**: Imagem de fundo utilizada na aplicação.
- **layouts/header.php**: Arquivo com o código do cabeçalho (Navbar).
- **contato.php**: Página com informações de contato.
- **index.php**: Página inicial com o formulário para o usuário inserir sua data de nascimento.
- **show_zodiac_sign.php**: Página que processa a data de nascimento e exibe o signo correspondente.
- **signos.xml**: Arquivo XML com informações sobre os signos zodiacais.
- **sobre.php**: Página com informações sobre o projeto.


## Tecnologias Utilizadas

### Linguagens
- **PHP**
- **HTML5**
- **CSS3**
- **XML**

### Bibliotecas
- **Bootstrap 5.3.0**: Para estilização e layout responsivo.
- **Flatpickr**: Para um seletor de datas amigável e consistente.

### Outros
- **Markdown**: Para documentação.


## Como Rodar o Projeto

### Pré-requisitos
- Servidor local configurado com **PHP** (ex.: **XAMPP** ou **WAMP**).
- Navegador atualizado.

### Passos

1. **Baixar o Projeto**:  
   Faça o download do projeto e extraia os arquivos na pasta `htdocs` (se estiver usando XAMPP) ou na pasta equivalente do seu servidor.

2. **Configurar o Servidor**:  
   Certifique-se de que o servidor local esteja rodando.

3. **Acessar o Projeto**:  
   No navegador, digite o caminho para o projeto. Por exemplo:  

[Acesse o Projeto](http://localhost/Project/index.php)

4. **Navegar pelo Sistema**

### Página Inicial
- Insira a sua data de nascimento no formato **dd/mm/aaaa** ou utilize o seletor interativo.

### Página de Resultado
- Veja o signo correspondente à data informada.
- Clique em **"Voltar"** para retornar à página inicial.

### Página Sobre
- Leia mais sobre o funcionamento do projeto.

### Página Contato
- Veja informações de contato do desenvolvedor.


## Detalhes Técnicos

### Flatpickr (Seleção de Datas)
- O campo de entrada de data usa o **Flatpickr** para permitir tanto a digitação manual quanto a seleção por calendário.

### Configuração no JavaScript
```javascript
flatpickr("#birthdate", {
    dateFormat: "d/m/Y", // Define o formato de data: dia/mês/ano
    allowInput: true,    // Permite digitação manual
    locale: "pt"         // Tradução para português
});


## Lógica para Identificação do Signo

A lógica em **show_zodiac_sign.php** compara a data de nascimento informada com as datas de início e fim de cada signo no arquivo **signos.xml**.

### Exemplo de comparação:
```php
if (
    ($mesNascimento == $mesInicio && $diaNascimento >= $diaInicio) || 
    ($mesNascimento == $mesFim && $diaNascimento <= $diaFim) || 
    ($mesInicio > $mesFim && ($mesNascimento > $mesInicio || $mesNascimento < $mesFim))
) {
    return $signo;
}


## Arquivo XML (signos.xml)

### Estrutura do arquivo:
```xml
<?xml version="1.0" encoding="UTF-8"?>
<signos>
    <signo>
        <signoNome>Áries</signoNome>
        <dataInicio>21/03</dataInicio>
        <dataFim>20/04</dataFim>
        <descricao>Pessoas do signo de Áries são corajosas e determinadas.</descricao>
    </signo>
    <!-- Outros signos -->
</signos>


## Responsividade

### Desktop
- Design otimizado com uso do **Bootstrap**.

### Celular
- Seletor de data interativo e layout ajustado para telas menores.

## Possíveis Melhorias Futuras
- Adicionar suporte para temas personalizados.
- Implementar validação adicional para datas inválidas no servidor.
- Criar um banco de dados em **MySQL** para armazenar os dados dos signos.
