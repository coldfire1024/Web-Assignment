<form class="edit-profile-form" method="POST" action="{{ route('checkout') }}">
    @csrf
    <h1 class="edit-profile-form-title">编辑个人资料 | Checkout</h1>
    <h2 class="subtitle">Billing Information</h2>
    <div class="form-top">
        <div class="edit-profile-form-input-field">
            <label for="full-name">Fullname</label>
            <input id="full-name" name="full-name" type="text" placeholder="Min. 5 Characters">
        </div>
        <div class="edit-profile-form-input-field">
            <label for="phone">Phone Number</label>
            <input id="phone" name="phone" type="text" placeholder="Has to be 12 numbers">
        </div>
        <div class="edit-profile-form-input-field">
            <label for="country">Country</label>
            <select name="country" id="country">
                <option value="Indonesia" selected>Indonesia</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Singapore">Singapore</option>
                <option value="Thailand">Thailand</option>
                <option value="Vietnam">Vietnam</option>
            </select>
        </div>
        <div class="edit-profile-form-input-field">
            <label for="city">City</label>
            <input id="city" name="city" type="text" placeholder="Min. 5 Characters">
        </div>
        <div class="edit-profile-form-input-field">
            <label for="card-name">Card Name</label>
            <input id="card-name" name="card-name"" type="text" placeholder="Min. 3 Characters">
        </div>
        <div class="edit-profile-form-input-field">
            <label for="card-number">Card Number</label>
            <input id="card-number" name="card-number" type="text"
                placeholder="Must be numerical and have 16 characters">
        </div>
    </div>
    <div class="form-bottom">
        <h2 class="subtitle">Additional Information</h2>
        <div class="edit-profile-form-input-field-b">
            <label for="address">Address</label>
            <input id="address" name="address" type="text" placeholder="Min. 5 Characters">
        </div>
        <div class="edit-profile-form-input-field-b">
            <label for="postal-code">ZIP/Postal Code</label>
            <input id="postal-code" name="postal-code" type="text" placeholder="Fill with number only">
        </div>
    </div>
    <div class="edit-profile-form-footer">
        <a class="edit-profile-form-submit-button" href="{{ route('cart') }}">Cancel</a>
        <button class="edit-profile-form-submit-button" type="submit">Place Order</button>
    </div>
</form>
