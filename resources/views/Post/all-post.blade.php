@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center"> Create a new story </h5>
                    <hr>
                    <form>
                        <div class="form-group">
                            <label for="inputAddress">Title</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword4">Story Type</label>
                            <select id="companytype" type="text" class="form-control"  name="companytype">
                                <option value="Accounting/Finance">Accounting/Finance</option>
                                <option value="Bank">Bank</option>
                                <option value="IT & Telecommunication">IT & Telecommunication</option>
                                <option value="Garments/Textile">Garments/Textile</option>
                                <option value="NGO/Development">NGO/Development</option>
                                <option value="Marketing/Sales">Marketing/Sales</option>
                                <option value="Customer Support/Call Centre">Customer Support/Call Centre</option>
                                <option value=" Medical/Pharma"> Medical/Pharma</option>
                                <option value="NGO/Development">NGO/Development</option>
                                <option value="Law/Legal">Law/Legal</option>
                                <option value="Design/Creative">Design/Creative</option>
                                <option value="Automobile/Industrial Machine">Automobile/Industrial Machine</option>
                                <option value="Hotel/Restaurant">Hotel/Restaurant</option>
                                <option value="Hospitality/Travel">Hospitality/Travel</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Description</label>
                            <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputCity">Image</label>
                            <input type="file" class="form-control-file border" name="file">
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection