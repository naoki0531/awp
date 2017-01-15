<!DOCTYPE html>
<html>
    <head>
        <title>AWP作成ツール</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <section style="margin-left:5%; margin-right:5%">
      <h1>AWP作成ツール</h1>
      <h3>メールに記述する内容を入力</h3>
      <form action="/awp" method="post">
        <div class="form-group">
          <label for="no">No:</label>
          <input type="text" name="no" id="no" class="form-control" value="<?php echo $input['no']; ?>"/>
        </div>
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" name="title" id="title" class="form-control" value="<?php echo $input['title']; ?>"/>
        </div>
        <div class="form-group">
          <label for="text">Title:</label>
          <textarea rows=”10″ cols=”60″ name="text" id="text" class="form-control"><?php echo $input['text']; ?></textarea>
        </div>
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <button type="submit" class="btn btn-info">作成</button>
      </form>
    <hr>
    <h3>プレビュー</h3>
    <?php echo $preview; ?>
    </body>
  </section>
</html>
