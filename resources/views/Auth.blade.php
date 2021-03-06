@extends('layout.master')

@section('content')


                    
                    <div class="row">
                        <?php 
                            $cost = 0;
                            foreach($mon_co as $val){
                               $cost += $val->amount;
                            }
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{'/mycost'}}">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Cost (Monthly)</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cost;?> /=</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                               
                        </div>
                        
                        
                       

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{'/costCatagory'}}">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    Cost Category</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-danger"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!--Income Catagory Option -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{'/incomeCatagory'}}">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Income Category</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas  fa-text-width fa-2x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <?php 
                            $income = 0;
                            foreach($mon_in as $val){
                               $income += $val->amount;
                            }
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{'/income'}}">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Income (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $income;?> /=</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-money-check-alt fa-2x text-info"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <?php 
                            $lend = 0;
                            foreach($total_len as $val){
                               $lend += $val->amount;
                            }
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{'/lending'}}">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                ????????? ??????????????? ???????????????</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $lend;?> /=</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-donate fa-2x text-warning"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <!-- ?????? ????????? ??????????????? -->
                        <?php 
                            $borrow = 0;
                            foreach($total_bor as $val){
                               $borrow += $val->amount;
                            }
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{'/borrow'}}">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                                ?????? ????????? ???????????????</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo  $borrow;?> /=</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hand-holding-heart fa-2x text-secondary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>

@endsection