<?php
$logged = $this->request->getSession()->read('Auth.User.id');

if (empty($logged)):
  $this->layout = 'ajax';
?>
  <script>
  location.replace("/");
  </script>
<?php
else:
  $this->layout = 'my_error';
?>
<div class="text-center">
  <div class="error mx-auto" data-text="400">400</div>
  <p class="lead text-gray-800 mb-5">Bad Request</p>
  <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
  <a href="/">&larr; Back to Dashboard</a>
</div>
<?php
endif;
?>
