<html lang="en">
<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:../index.php?pesan=belum_login");
}
?>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="./../../css/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">SHEESHHHh</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                <span data-feather="file" class="align-text-bottom"></span>
                                Members
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../groups/index.php">
                                <span data-feather="book" class="align-text-bottom"></span>
                                Groups
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../owners/index.php">
                                <span data-feather="briefcase" class="align-text-bottom active"></span>
                                Company
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">
                                <span data-feather="log-out" class="align-text-bottom active"></span>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                </div>
                <form class="d-flex" role="search" method="GET" action="index.php">
                    <input class="form-control mt-1 form-control-white" type="text" value="<?php if (isset($_GET['search'])) {
                                                                                                echo $_GET['search'];
                                                                                            } ?>" placeholder="Search" name="search">
                    <button class="btn btn-primary mt-1" type="submit">Search</button>
                </form>
                <h2>Member Data</h2>
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Tambah Data
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Company</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="add_action.php">
                                    <div class="form-group mb-2">
                                        <label>Nickname</label>
                                        <input class="form-control" type="text" name="nickname" placeholder="Nickname">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Name</label>
                                        <input class="form-control" type="text" name="name" placeholder="Name">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Group</label>
                                        <select class="form-control" name="group_name" id="group_name">
                                            <option disabled selected> - Pilih Group - </option>
                                            <?php
                                            include '../../connection.php';
                                            $sql = mysqli_query($mysqli, "select * from kelompok");
                                            while ($data = mysqli_fetch_array($sql)) {
                                            ?>
                                                <option value="<?= $data['group_name'] ?>/<?= $data['company_name'] ?>"><?= $data['group_name'] ?> (<?= $data['company_name'] ?>)</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Nickname</th>
                                <th scope="col">Name</th>
                                <th scope="col">Group</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../../connection.php';
                            $no = 1;
                            if (isset($_GET['search'])) {
                                //menampung variabel search dari form pencarian
                                $search = $_GET['search'];
                                $query = "select * from members where nickname like '%" . $search . "%' OR name like '%" . $search . "%' OR group_name like '%" . $search . "%' OR company_name like '%" . $search . "%' ORDER BY id_members ASC";
                            } else {
                                //jika tidak ada pencarian, default yang dijalankan query ini
                                $query = "SELECT * FROM members ORDER BY id_members ASC";
                            }
                            $data = mysqli_query($mysqli, $query);
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $d['nickname']; ?></td>
                                    <td><?= $d['name']; ?></td>
                                    <td><?= $d['group_name']; ?></td>
                                    <td><?= $d['company_name']; ?></td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit<?php echo $d['id_members']; ?>">EDIT</a>

                                        <!-- Modal edit -->
                                        <div class="modal fade" id="staticBackdropEdit<?php echo $d['id_members']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">

                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Data Company</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php
                                                        include '../../connection.php';
                                                        $id = $d['id_members'];
                                                        $query_edit  = mysqli_query($mysqli, "select * from members where id_members='$id'");
                                                        while ($dEdit = mysqli_fetch_array($query_edit)) {
                                                        ?>
                                                            <form method="post" action="update_action.php">
                                                                <table>
                                                                    <div class="form-group mb-2">
                                                                        <label>Nickname</label>
                                                                        <input type="hidden" name="id_members" value="<?php echo $dEdit['id_members']; ?>">
                                                                        <input class="form-control" type="text" name="nickname" value="<?php echo $dEdit['nickname']; ?>">
                                                                    </div>
                                                                    <div class="form-group mb-2">
                                                                        <label>Name</label>
                                                                        <input class="form-control" type="text" name="name" value="<?php echo $dEdit['name']; ?>">
                                                                    </div>
                                                                    <div class="form-group mb-2">
                                                                        <label>Group</label>
                                                                        <select class="form-control" name="group_name" id="group_name">
                                                                            <?php
                                                                            include '../../connection.php';
                                                                            $sql = mysqli_query($mysqli, "select * from kelompok");
                                                                            while ($dOption = mysqli_fetch_array($sql)) {
                                                                            ?>
                                                                                <option value="<?= $dOption['group_name'] ?>/<?= $dOption['company_name'] ?>" <?= $dOption['group_name'] . "/" . $dOption['company_name'] == $dEdit['group_name'] . "/" . $dEdit['company_name'] ? "selected" : "" ?>><?= $dOption['group_name'] ?> (<?= $dOption['company_name'] ?>)</option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </table>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                </div>
                                                            </form>
                                                    </div>
                                                <?php
                                                        }
                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="delete.php?id_members=<?= $d['id_members']; ?>" onclick="return confirm('Are you sure ?')">HAPUS</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="../../js/dashboard.js"></script>
</body>

</html>