<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5>Список пользователей</h5>
        <div>
            <a href="<?= base_url('admin/users/true') ?>" class="btn btn-sm btn-warning me-2">Показать удаленных</a>
            <a href="<?= base_url('admin/users') ?>" class="btn btn-sm btn-light me-2">Только активные</a>
            <a href="<?= base_url('admin/add_user') ?>" class="btn btn-sm btn-light">➕ Добавить</a>
        </div>
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
                    <th>Статус</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u): ?>
                <tr class="<?= $u->is_deleted == 1 ? 'table-secondary text-muted' : '' ?>">
                    <td><?= $u->id_u ?></td>
                    <td><?= $u->fio ?></td>
                    <td><?= $u->login ?></td>
                    <td>
                        <span class="badge bg-<?= $u->role == 1 ? 'danger' : ($u->role == 2 ? 'primary' : 'success') ?>">
                            <?= $u->role_name ?>
                        </span>
                    </td>
                    <td>
                        <?php if ($u->is_deleted == 1): ?>
                            <span class="badge bg-secondary">Удален</span>
                        <?php else: ?>
                            <span class="badge bg-success">Активен</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($u->is_deleted == 1): ?>
                            <a href="<?= base_url('admin/restore_user/'.$u->id_u) ?>" class="btn btn-sm btn-success" onclick="return confirm('Восстановить пользователя?')">↩ Восстановить</a>
                        <?php else: ?>
                            <a href="<?= base_url('admin/delete_user/'.$u->id_u) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Переместить пользователя в корзину?')">🗑 Удалить</a>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>