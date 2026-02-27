<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5>Список пользователей</h5>
        <a href="<?= base_url('admin/add_user') ?>" class="btn btn-sm btn-light">➕ Добавить</a>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('msg')): ?>
            <div class="alert alert-success"><?= $this->session->flashdata('msg') ?></div>
        <?php endif; ?>
        
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>ФИО</th>
                    <th>Логин</th>
                    <th>Роль</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u): ?>
                <tr>
                    <td><?= $u->id_u ?></td>
                    <td><?= $u->fio ?></td>
                    <td><?= $u->login ?></td>
                    <td>
                        <span class="badge bg-<?= $u->role == 1 ? 'danger' : ($u->role == 2 ? 'primary' : 'success') ?>">
                            <?= $u->role_name ?>
                        </span>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/delete_user/'.$u->id_u) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Удалить?')">Удалить</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>