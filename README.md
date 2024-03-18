# O que há de novo?

**Confira neste artigo tudo que já foi atualizado**

- **Página categoria**
    - Exibição da descrição da categoria
    - Exclusão da categoria
- **Filtragem por status v2**
    - Conflito nos routers da classificação em categorias
    - Transmissão de parâmetro pelo método get sem a necessidade de registrar um router exclusivo
    - Filtragem pela listagem de metas avulsas
    - Filtragem pela listagem de metas classificadas em uma categoria
- **Contador de inserções por categoria**
    - Geração de novo router específico para a contagem de inserções da categoria específica
    - Na função de listagem de categoria, os dados são puxados do banco de dados
    - O array que contém os dados passa por um comando for, onde é contado o número de metas em cada categoria
    - Uma nova propriedade é adicionada à lista: 'numElem', que exibirá o valor ao lado do rótulo
    - Adicionando condicional para contador aparecer apenas a partir de um registro
- **Organização de inserções por categorias**
    - Tabela de registros de categorias
    - Simplificação do formulário de registro de nova categoria → submeter com enter
    - Substituição do componente Home.vue pelo componente Main.vue
    - Captação do caminho da URL para acesso à página da categoria específica
    - Criação condicional da classe 'active' na menu de categoria
    - Tabela auxiliar de relacionamento entre metas e categorias
    - Criação de rotulosID para url amigável
    - Definir eventos de atualização de listagem de acordo com a página da categoria
- **Filtragem por status v2**
    - form select para definição do status
    - Determinar caminho na API → comando WHERE
- **Independência entre o formulário de inserção de metas com a listagem de letas**
    - Adicionada nova meta pelo formulário
    - Emissão de requisição de atualização para componente pai
    - O pai torna a requisição verdadeira e manda para o componente de listagem
    - O componente responsável pela listagem atende a requisição
    - Emite de volta ao pai que a solicitação foi atendida
- **Possibilidade de marcar como concluída no checkbox**
    - Ao marcar como concluída, o banco de dados é atualizado e o ciclo de vida da reatividade está terminado
    - Uma nova solicitação de listagem é acionada automaticamente
- **Atualização de listagem instantâneo no acrescentar de nova meta**
    - Ao adicionar uma nova inserção no banco de dados, o ciclo de vida está terminado
    - Uma solicitação de atualização de listagem é enviada par ao componente filho
    - Ao receber a solicitação, este atualiza a listagem das inserções
    - Emite de volta ao pai que a solicitação foi atendida
    - **Desafio:** O componente de listagem é filho do componente do formulário de adição de nocas inserções
- **Exclusão de metas**
    - Ao clicar no ícone da lixeira no canto inferior direito do card da inserção
    - A função deletarInserção é chamada
    - A route do tipo delete é chamada no laravel, identificando o ID da inserção e a eliminando
- **Mostrar / ocultar detalhes no formulário de inserção**
    - Através de um v-if, detalhes de preenchimento da inserção é exibido
    - Se não exibido, o botão possui "mostrar detalhes" como títulos, caso contrário é "esconder detalhes"
    - A opção v-if foi selecionada ao invés do v-show, pois o segundo oculta o conteúdo com um display:none

# Próximas atualizações

**Desenvolvendo o sistema para ficar cada vez melhor**

- Barra de progresso de metas-mãe de acordo com o número de metas-filhas
- Aninhamento de metas-filhas nas metas-mãe
    - Tabela auxiliar de relacionamento entre metas
    - Se não exibido, o botão possui "mostrar detalhes" como títulos, caso contrário é "esconder detalhes"
    - A opção v-if foi selecionada ao invés do v-show, pois o segundo oculta o conteúdo com um display:none
- Barra de progresso de metas-mãe de acordo com o número de metas-filhas