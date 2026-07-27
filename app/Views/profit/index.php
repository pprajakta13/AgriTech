<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/navbar') ?>

<div class="container mt-5">

<h2 class="text-success mb-4">
Farmer Profit Calculator
</h2>

<form method="post" action="<?= site_url('profit/calculate') ?>">
<div class="mb-3">

<label class="form-label">Select Crop</label>

<select name="crop_id" class="form-select">

<?php foreach($crops as $crop): ?>

<option value="<?= $crop['id'] ?>">
<?= esc($crop['crop_name']) ?>
</option>

<?php endforeach; ?>

</select>

</div>

<div class="mb-3">

<label class="form-label">
Quantity (Quintals)
</label>

<input
type="number"
name="quantity"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Production Cost (₹)
</label>

<input
type="number"
name="cost"
class="form-control"
required>

</div>

<button class="btn btn-success">

Calculate Profit

</button>

</form>
<?php if(isset($error)): ?>
<div class="alert alert-danger">
    <?= esc($error) ?>
</div>
<?php endif; ?>
<?php if(isset($result)): ?>
    <?php if(isset($error)): ?>
<div class="alert alert-danger">
    <?= esc($error) ?>
</div>
<?php endif; ?>

<div class="alert mt-4 <?= $result['profit'] >=0 ? 'alert-success':'alert-danger' ?>">

<h4>Result</h4>

<p><strong>Market Price:</strong>
₹ <?= $result['market_price'] ?>/Quintal
</p>

<p><strong>Total Revenue:</strong>
₹ <?= $result['revenue'] ?>
</p>

<p><strong>Profit/Loss:</strong>
₹ <?= $result['profit'] ?>
</p>

</div>

<?php endif; ?>

</div>

<?= $this->include('layouts/footer') ?>