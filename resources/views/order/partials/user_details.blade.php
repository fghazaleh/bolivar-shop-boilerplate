<div class="heading">
    <h3><i class="fa fa-user"></i> Your details</h3>
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="{{old('email')}}" required class="form-control"/>
</div>
<div class="form-group">
    <label for="name">Full name</label>
    <input type="text" id="name" name="name" value="{{old('name')}}" required class="form-control"/>
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required class="form-control"/>
</div>