<div class="row container">
    <div class= "col s12">
        <h3 class="light">Página Consulta  
        </h3>
    </div>
    <div class="col s12">
        <table class="highlight responsive-table">
            <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Ação</th>
            </tr>
            </thead>

            <tbody>
                <?php foreach($consulta as $registro): ?>
                    <tr>
                        <td><?= $registro['nome']?></td>
                        <td><?= $registro['email']?></td>
                        <td><?= $registro['telefone']?></td>
                        <td><a href="?router=Site/editar/&id=<?= $registro['id']?>">Editar</a>|
                        <a href="?router=Site/DeleteForm/&id=<?= $registro['id']?>" class="red-text">Deletar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    </div>
</div>
