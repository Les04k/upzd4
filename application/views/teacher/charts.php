<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5>Графики успеваемости</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <h6>Успеваемость группы</h6>
                            </div>
                            <div class="card-body">
                                <form method="get" action="">
                                    <div class="mb-3">
                                        <label class="form-label">Выберите группу</label>
                                        <select name="group" class="form-control">
                                            <option value="">-- Выберите --</option>
                                            <?php foreach ($groups as $g): ?>
                                                <option value="<?= $g->title ?>" <?= $this->input->get('group') == $g->title ? 'selected' : '' ?>>
                                                    <?= $g->title ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Показать</button>
                                </form>
                                
                                <?php if (isset($group_avg)): ?>
                                    <hr>
                                    <h6 class="mt-3">Средний балл группы <?= $selected_group ?> по дисциплинам:</h6>
                                    <?php if (empty($group_avg)): ?>
                                        <p class="text-muted">Нет данных</p>
                                    <?php else: ?>
                                        <canvas id="groupChart" style="max-height: 300px;"></canvas>
                                        <table class="table table-sm mt-3">
                                            <thead>
                                                <tr>
                                                    <th>Дисциплина</th>
                                                    <th>Средний балл</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($group_avg as $g): ?>
                                                <tr>
                                                    <td><?= $g->title ?></td>
                                                    <td>
                                                        <span class="badge bg-<?= $g->avg_grade >= 4 ? 'success' : ($g->avg_grade >= 3 ? 'warning' : 'danger') ?>">
                                                            <?= number_format($g->avg_grade, 2) ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <h6>Успеваемость студента</h6>
                            </div>
                            <div class="card-body">
                                <form method="get" action="">
                                    <div class="mb-3">
                                        <label class="form-label">Выберите студента</label>
                                        <select name="student" class="form-control">
                                            <option value="">-- Выберите --</option>
                                            <?php foreach ($students as $s): ?>
                                                <option value="<?= $s->id_u ?>" <?= $this->input->get('student') == $s->id_u ? 'selected' : '' ?>>
                                                    <?= $s->fio ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Показать</button>
                                </form>
                                
                                <?php if (isset($student_avg)): ?>
                                    <hr>
                                    <h6 class="mt-3">Средний балл студента <?= $selected_student ?>:</h6>
                                    <?php if (empty($student_avg)): ?>
                                        <p class="text-muted">Нет данных</p>
                                    <?php else: ?>
                                        <canvas id="studentChart" style="max-height: 300px;"></canvas>
                                        <table class="table table-sm mt-3">
                                            <thead>
                                                <tr>
                                                    <th>Дисциплина</th>
                                                    <th>Средний балл</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($student_avg as $s): ?>
                                                <tr>
                                                    <td><?= $s->title ?></td>
                                                    <td>
                                                        <span class="badge bg-<?= $s->avg_grade >= 4 ? 'success' : ($s->avg_grade >= 3 ? 'warning' : 'danger') ?>">
                                                            <?= number_format($s->avg_grade, 2) ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
<?php if (isset($group_avg) && !empty($group_avg)): ?>
    const groupCtx = document.getElementById('groupChart').getContext('2d');
    new Chart(groupCtx, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($group_avg as $g) echo "'$g->title',"; ?>],
            datasets: [{
                label: 'Средний балл',
                data: [<?php foreach ($group_avg as $g) echo "$g->avg_grade,"; ?>],
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 5
                }
            }
        }
    });
<?php endif; ?>

<?php if (isset($student_avg) && !empty($student_avg)): ?>
    const studentCtx = document.getElementById('studentChart').getContext('2d');
    new Chart(studentCtx, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($student_avg as $s) echo "'$s->title',"; ?>],
            datasets: [{
                label: 'Средний балл',
                data: [<?php foreach ($student_avg as $s) echo "$s->avg_grade,"; ?>],
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 5
                }
            }
        }
    });
<?php endif; ?>
</script>