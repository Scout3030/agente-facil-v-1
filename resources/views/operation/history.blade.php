@extends('layouts.app')

@section('content')

  <!-- Content
  ============================================= -->
  <div id="content" class="py-4">
    <div class="container">
      <div class="row">

        @include('partials.aside')

        <!-- Middle Panel
        ============================================= -->
        <div class="col-lg-9">

          <h2 class="font-weight-400 mb-3">Operaciones</h2>
          <!-- Filter
          ============================================= -->
          <!-- <div class="row">
            <div class="col mb-2">
              <form id="filterTransactions" method="post">
                <div class="form-row"> -->
                  <!-- Date Range
                  ========================= -->
                  <!-- <div class="col-sm-6 col-md-5 form-group">
                    <input id="dateRange" type="text" class="form-control" placeholder="Date Range">
                    <span class="icon-inside"><i class="fas fa-calendar-alt"></i></span>
                  </div> -->
                  <!-- All Filters Link
                  ========================= -->
                  <!-- <div class="col-auto d-flex align-items-center mr-auto form-group" data-toggle="collapse"> <a class="btn-link" data-toggle="collapse" href="#allFilters" aria-expanded="false" aria-controls="allFilters">All Filters<i class="fas fa-sliders-h text-3 ml-1"></i></a> </div> -->
                  <!-- Statements Link
                  ========================= -->
                  <!-- <div class="col-auto d-flex align-items-center ml-auto form-group">
                    <div class="dropdown"> <a class="text-muted btn-link" href="#" role="button" id="statements" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-file-download text-3 mr-1"></i>Statements</a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="statements"> <a class="dropdown-item" href="#">CSV</a> <a class="dropdown-item" href="#">PDF</a> </div>
                    </div>
                  </div> -->

                  <!-- All Filters collapse
                  ================================ -->
                  <!-- <div class="col-12 collapse mb-3" id="allFilters">
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="allTransactions" name="allFilters" class="custom-control-input" checked="">
                      <label class="custom-control-label" for="allTransactions">All Transactions</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="paymentsSend" name="allFilters" class="custom-control-input">
                      <label class="custom-control-label" for="paymentsSend">Payments Send</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="paymentsReceived" name="allFilters" class="custom-control-input">
                      <label class="custom-control-label" for="paymentsReceived">Payments Received</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="refunds" name="allFilters" class="custom-control-input">
                      <label class="custom-control-label" for="refunds">Refunds</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="withdrawal" name="allFilters" class="custom-control-input">
                      <label class="custom-control-label" for="withdrawal">Withdrawal</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="deposit" name="allFilters" class="custom-control-input">
                      <label class="custom-control-label" for="deposit">Deposit</label>
                    </div>
                  </div> -->
                  <!-- All Filters collapse End -->
                <!-- </div>
              </form>
            </div>
          </div> -->
          <!-- Filter End -->

          <!-- All Transactions
          ============================================= -->
          <div class="bg-light shadow-sm rounded py-4 mb-4">
            <h3 class="text-5 font-weight-400 d-flex align-items-center px-4 mb-3">Todas las operaciones</h3>
            <!-- Title
            =============================== -->
            <div class="transaction-title py-2 px-4">
              <div class="row">
                <div class="col-2 col-sm-1 text-center"><span class="">Fecha</span></div>
                <div class="col col-sm-2">Operación</div>
                <div class="col col-sm-2">Desde</div>
                <div class="col col-sm-2">Hacia</div>
                <div class="col col-sm-2">Empresa</div>
                <div class="col-auto col-sm-1 d-none d-sm-block text-center">Estado</div>
                <div class="col-3 col-sm-2 text-center">Monto</div>
              </div>
            </div>
            <!-- Title End -->

            <!-- Transaction List
            =============================== -->
            <div class="transaction-list">
              @forelse($operations as $operation)
              <div class="transaction-item px-4 py-3" data-toggle="modal" data-target="#transaction-detail">
                <div class="row align-items-center flex-row">
                  <div class="col-2 col-sm-1 text-center">
                    <span class="d-block text-4 font-weight-300">{{$operation->created_at->format('d')}}</span>
                    <span class="d-block text-1 font-weight-300 text-uppercase">{{$operation->created_at->format('F')}}</span>
                  </div>

                  <div class="col-3 col-sm-2 text-left text-3">
                    <span class="text-nowrap">{{ucfirst($operation->operationType->type)}}</span>
                  </div>

                  @if($operation->operationType->id == \App\OperationType::TRANSFER)

                  @foreach($operation->transfers as $transfer)
                  <div class="col col-sm-2">
                    <span class="text-nowrap">{{$transfer->account->bank->name}}</span>
                    <br>
                    <span class="text-muted">{{$transfer->account->number}}</span>
                  </div>
                  @endforeach

                  <div class="col-3 col-sm-2">
                    <!-- <span class="text-nowrap">--</span>
                    <span class="text-muted">--</span> -->
                  </div>
                  @endif

                  @if($operation->operationType->id == \App\OperationType::PAYMENT)
                  <div class="col col-sm-2">
                    <span class="text-nowrap">{{$operation->payment->account->bank->name}}</span>
                    <br>
                    <span class="text-muted">{{$operation->payment->account->number}}</span>
                  </div>

                  <div class="col-3 col-sm-2">
                    <!-- <span class="text-nowrap">--</span>
                    <span class="text-muted">--</span> -->
                  </div>

                  <div class="col-3 col-sm-2">
                    <span class="text-nowrap">{{$operation->payment->bankOperation->name}}</span>
                    <span class="text-muted">({{ucfirst(strtolower($operation->payment->bankOperation->bank->name))}})</span>
                  </div>
                  @endif



                  @if($operation->status == \App\Operation::COMPLETED)
                  <div class="col-auto col-sm-1 d-none d-sm-block text-center text-3">
                    <span class="text-success" data-toggle="tooltip" data-original-title="Completada"><i class="fas fa-check-circle" title="Completada"></i></span>
                  </div>
                  @endif
                  @if($operation->status == \App\Operation::INPROCESS)
                  <div class="col-auto col-sm-1 d-none d-sm-block text-center text-3">
                    <span class="text-warning" data-toggle="tooltip" data-original-title="En proceso"><i class="fas fa-ellipsis-h" title="En proceso"></i></span>
                  </div>
                  @endif
                  @if($operation->status == \App\Operation::CANCELLED)
                  <div class="col-auto col-sm-1 d-none d-sm-block text-center text-3">
                    <span class="text-danger" data-toggle="tooltip" data-original-title="Cancelada"><i class="fas fa-times-circle" title="Cancelada"></i></span>
                  </div>
                  @endif
                  <div class="col-3 col-sm-2 text-right text-4">
                    <span class="text-nowrap">S/{{$operation->amount}}</span>
                    <br>
                    <span class="text-2 text-uppercase">(PEN)</span>
                  </div>

                </div>
              </div>
              @empty
              <div class="transaction-item px-4 py-3" data-toggle="modal" data-target="#transaction-detail">
                Ninguna operación realizada hasta el momento
              </div>
              @endforelse
            </div>
            <!-- Transaction List End -->

            @include('partials.history.modal')

            {{$operations->links()}}

            <!-- Pagination
            ============================================= -->
            <ul class="pagination justify-content-center mt-4 mb-0">
              {{$operations->links()}}
            </ul>
            <!-- Paginations end -->

          </div>
          <!-- All Transactions End -->
        </div>
        <!-- Middle End -->
      </div>
    </div>
  </div>
  <!-- Content end -->

@endsection