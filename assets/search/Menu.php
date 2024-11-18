<?php


require_once __DIR__ . '/../../DB/Connection.php';
require_once __DIR__ . '/../../Model/Model.php';
require_once __DIR__ . '/../../Model/Items.php';

$keyword = $_GET['keyword'];
$items = new Item();
$items = $items->search($keyword);

?>

                   <div id="content" class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                          </th>
                          <th>Nama Menu</th>
                          <th>Gambar</th>
                          <th>ID</th>
                          <th>Price</th>
                          <th>Action</th>
                        </tr>
                        <?php foreach ($items as $item) : ?>
                        <tr >
                          <td class="">
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                              <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td><?= $item["name"] ?></td> 
                          <td><img src="../../post/public/img/<?= 'items' . $item["attachment"] ?>" style="width: 50px; height: 50px; border-radius: 999px;"></td>
                          <td><?= $item["category_id"] ?></td> 
                          <td><?= $item["price"] ?></td> 
                          <td class="justify-content-end">
                            <a href="detail-items.php?id=<?= $item["id"] ?>" class="btn btn-primary mr-1"><i class="far fa-eye"></i> Detail</a>
                            <a href="edit-items.php?id=<?= $item["id"] ?>" class="btn btn-success mr-1"> <i class="far fa-edit"></i> Edit</a>
                            <a href="delete-items.php?id=<?= $item["id"] ?>" class="btn btn-danger mr-1"><i class="far fa-trash-alt"></i> Hapus</a>
                          </td>
                        </tr>
                        <?php endforeach ?>
                      </table>
                    </div>