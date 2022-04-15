<?php
require_once('includes/startup.php');
require_once('libraries/manage_users_lib.php');
?>
<?php require_once('common/html_start.php'); ?>
<?php require_once('common/header.php'); ?>
<?php require_once('common/sidebar.php'); ?>

<form method="post" action="">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Users</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <a href="form_user.php" class="btn btn-sm btn-outline-secondary">Add New User</a>
          </div>

          <div class="btn-group me-2">
            <input type="submit" value="Delete" name="btnDelete" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?');" />
          </div>
        </div>
      </div>
	  
	  <?php displayAlert(); ?>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col"><input type="checkbox" onclick="$('.chk').prop('checked', $(this).is(':checked'));" /></th>
              <th scope="col">
                <a href="manage_users.php?sort_by=user_id&sort_order=<?php echo $sort_order; ?>">User ID 
                <?php if($sort_by == 'user_id'){ ?>
                <span data-feather="chevron-<?php echo ($sort_order == 'ASC')?'down':'up'; ?>"></span>
                <?php } ?>
              </a> 
                </th>
              <th scope="col">
              <a href="manage_users.php?sort_by=username&sort_order=<?php echo $sort_order; ?>">Username 
                <?php if($sort_by == 'username'){ ?>
                <span data-feather="chevron-<?php echo ($sort_order == 'ASC')?'down':'up'; ?>"></span>
                <?php } ?>
              </a> 
              </th>
              <th scope="col">
              <a href="manage_users.php?sort_by=fullname&sort_order=<?php echo $sort_order; ?>">Fullname 
                <?php if($sort_by == 'fullname'){ ?>
                <span data-feather="chevron-<?php echo ($sort_order == 'ASC')?'down':'up'; ?>"></span>
                <?php } ?>
              </a>
              </th>
              <th scope="col">
              <a href="manage_users.php?sort_by=email&sort_order=<?php echo $sort_order; ?>">Email 
                <?php if($sort_by == 'email'){ ?>
                <span data-feather="chevron-<?php echo ($sort_order == 'ASC')?'down':'up'; ?>"></span>
                <?php } ?>
              </a>
              </th>
              <th scope="col">
              <a href="manage_users.php?sort_by=phone_number&sort_order=<?php echo $sort_order; ?>">Phone 
                <?php if($sort_by == 'phone_number'){ ?>
                <span data-feather="chevron-<?php echo ($sort_order == 'ASC')?'down':'up'; ?>"></span>
                <?php } ?>
              </a>
              </th>
              <th scope="col">
              <a href="manage_users.php?sort_by=status&sort_order=<?php echo $sort_order; ?>">Status 
                <?php if($sort_by == 'status'){ ?>
                <span data-feather="chevron-<?php echo ($sort_order == 'ASC')?'down':'up'; ?>"></span>
                <?php } ?>
              </a>
              </th>
              <th scope="col">
              <a href="manage_users.php?sort_by=date_added&sort_order=<?php echo $sort_order; ?>">Date Added 
                <?php if($sort_by == 'date_added'){ ?>
                <span data-feather="chevron-<?php echo ($sort_order == 'ASC')?'down':'up'; ?>"></span>
                <?php } ?>
              </a>
              </th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php if(sizeof($data_users)){ ?>
            <?php foreach($data_users as $data_user){ ?>
              <tr>
                <td><input type="checkbox" class="chk" name="user_ids[]" value="<?php echo $data_user['user_id']; ?>" /> </td>
                <td><?php echo $data_user['user_id']; ?></td>
                <td><?php echo $data_user['username']; ?></td>
                <td><?php echo $data_user['fullname']; ?></td>
                <td><?php echo $data_user['email']; ?></td>
                <td><?php echo $data_user['phone_number']; ?></td>
                <td><?php echo $data_user['status']; ?></td>
                <td><?php echo $data_user['date_added']; ?></td>
                <td><a href="form_user.php?user_id=<?php echo $data_user['user_id']; ?>"> Edit </a> | <a href="manage_users.php?action=delete&user_id=<?php echo $data_user['user_id']; ?>" onclick="return confirm('Are you sure want to delete this?');">Delete</a></td>
              </tr>
            <?php } ?>
          <?php } ?>
          </tbody>
        </table>

        <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item <?php echo ($page <= 1)?'disabled':'';?>"><a class="page-link" href="manage_users.php?page=<?php echo  ($page-1); ?>">Previous</a></li>

    <?php 
    $total_pages = ceil($user_total/$page_size);
    for($i = 1; $i <= $total_pages; $i++){ ?>
    <li class="page-item <?php echo ($i == $page)?'active':'';?>"><a class="page-link" href="manage_users.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php } ?>

    <li class="page-item <?php echo ($page >= $total_pages)?'disabled':'';?>"><a class="page-link" href="manage_users.php?page=<?php echo  ($page+1); ?>">Next</a></li>

    
  </ul>
</nav>
      </div>
    </main>
</form>
<?php require_once('common/scripts.php');?>
<?php require_once('common/html_ends.php');?>