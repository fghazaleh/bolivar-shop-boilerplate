<div class="heading">
    <h3><i class="fa fa-map-marker"></i> Shipping address</h3>
</div>
<div class="form-group">
    <label for="address1">Address line 1</label>
    <input type="text" id="address1" name="address1" value="{{old('address1')}}" required class="form-control"/>
</div>
<div class="form-group">
    <label for="address2">Address line 2</label>
    <input type="text" id="address2" name="address2" value="{{old('address2')}}" class="form-control"/>
</div>
<div class="form-group">
    <label for="city">City</label>
    <input type="text" id="city" name="city" value="{{old('city')}}" required class="form-control"/>
</div>
<div class="form-group">
    <label for="postal_code">Postal code</label>
    <input type="text" id="postal_code" name="postal_code" value="{{old('postal_code')}}" class="form-control"/>
</div>