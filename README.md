# Documentação 
```
Instalação:
- Usar Xampp na versão mais atualizada (MariaDB: 10.4.21, PHP: 8.0.12)
- Colocar todos os arquivos na pasta raiz do servidor Apache

-Se necessário mudar as propriedades de conexão com o servidor do banco de dados localizadas em 'Models/Model.php' dentro da função construtor
-Coloco em ênfase a propriedade caminhoMysql onde indica os arquivos do banco de dados e sem o caminho como descrito na mesma, o banco não vai gerar o Dump nem vai ser criado ou populado na hora da instalação.

-Se o programa não ficar na pasta raiz do Xammp:
    -Modificar o nome da Constante VENDOR_PATH em ‘Application.php’	 para o caminho em que o projeto ficou ex: 
        ‘http://localhost/case-giovane/’ 
    O mesmo para a constante em JavaScript no arquivo ‘recursos/js/index.js’ ex: 
        ‘/case-giovane/’
-Após com a configuração com banco de dados e paths padrões, logar para o primeiro acesso com:
	E-mail: root@root
	Senha: root
Clicar em ‘Criar banco de dados’. Após a mensagem de sucesso, pode clicar em popular base de dados para inserir alguns posts como teste e alguns usuários com permissões diferentes para testes também. E também o botão ‘Criar Backup’ para gerar o backup do banco onde fica salvo na pasta ‘backupBD’
-Pronto o sistema está com banco de dados criado e alguns posts,
- Tipos de usuário:
	‘gm’ o Administrador que tem acesso à o painel administrativo. Criação, alteração e exclusão de qualquer post.
	E-mail: giovane.gi2012@hotmail.com
	Senha: 123
	‘mod’ o Moderador que pode criar Posts e alterar e excluir somente os posts criados por ele mesmo.
	E-mail: maria@hotmail.com
	Senha: 123
	‘NULL’ o Visitante que só pode ver os posts de outras pessoas.
	Email: joao@hotmail.com
	Senha: 123
Todos os tipos de usuários podem alterar seus próprios nomes e-mails e senhas pelo Painel de Usuário.
```
