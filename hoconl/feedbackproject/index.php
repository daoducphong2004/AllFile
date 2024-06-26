<?php require 'components/header.php' ?>
    <h1>Enter your feedback here</h1>
    <form action="">
        <div class="mb-3">
            <input type="text" name="name" class="form-control" placeholder="What is your name">
        </div>
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="What is your email">
        </div>
        <div class="mb-3">
            <textarea name="feedback" id="" class="form-control" placeholder="Enter your feedback" row="2"></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" name="submit"  class="btn btn-primary">SEND</button>
        </div>
    </form>
<?php include 'components/footter.php'; ?>
