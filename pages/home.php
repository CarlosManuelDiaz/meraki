<?php
include '../layout/header.php';
include '../class/taskClass.php';
$taskClass = new taskClass();
$allTasksName = $taskClass->allTasksName($session_uid);
?>
    <div class="container fullwidth">
        <div class="col--lg--9 building">
            <div class="row">
                <nav>
                    <a href="profile.php"><div class="profile" style="background-image:url('../img/<?php echo $userDetails->profile_pic; ?>')"></div></a>
                    <div class="name">NOMBRE EDIFICIO</div>
                </nav>
            </div>
            <div class="row">
                <div class="tasks">
                    <div class="col--lg--12 sprint">
                        <span class="col--lg--12"></span>
                        <p>SPRINT 1</p>
                    </div>
                    <div class="col--lg--12 task-block ">
                    <?php
foreach ($allTasksName as $row) {
    ?>

                                <a href="#ex1" rel="modal:open">
                                <div class="col--lg--4 task">
                            <div>
                            <p><?php echo $row['task_name'] ?></p>
                        </div>
                        </div>
                                </a>
                        <?php
}
?>

                        <div class="date">
                            <p>21/03/2019 - 04/05/2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
foreach ($allTasksName as $row) {
    ?>
                                <div id="ex1" class="modal">
        <h1><?php echo $row['task_name'] ?></h1>
        <div><span>Fecha inicio: <?php echo $row['task_start_date'] ?></span><span>Fecha fin: <?php echo $row['task_final_date'] ?></span></div>
        <div class="description">
            <h2>Descripción</h2>
            <?php echo $row['task_description'] ?>
        </div>
                                <?php
}

include '../layout/sidebar.php';
?>
    </div>
<?php
include '../layout/footer.php';
