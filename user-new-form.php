<h1>Novo usuário</h1>
<form action="user-new.php" method="post">
    <table>
        <tr><td>Usuário: <td><input type="text" name="usuario" size="10" maxlength="10" required>
        <tr><td>Nome: <td><input type="text" name="nome" size="30" maxlength="30" required>
        <tr><td>Tipo: <td>
            <select name="tipo">
                <option value="editor">Editor</option>
                <option value="admin" selected>Administrador</option>
            </select>
        <tr><td>Senha: <td><input type="password" name="senha1" size="10" maxlength="10" required>
        <tr><td>Repita a senha: <td><input type="password" name="senha2" size="10" maxlength="10" required>
        <tr><td><input type="submit" value="Salvar">
    </table>
</form>