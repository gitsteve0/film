<div class="col-6 col-sm-4 col-lg-3">
    <a href="#" class="text-decoration-none text-dark">
        <div class="d-flex border bg-light rounded">
            <div class="col">
                <img src="{{ asset('img/seasons/season.jpg') }}" alt="{{ $season->name }}" class="img-fluid rounded">
            </div>
            <div class="col p-1 ps-2 py-2">
                <div class="fs-6 fw-semibold">
                    <i>{{$season->name}}</i> {{$season->age->name_tm}}  {{'(' . $season->year . ')'}}
                </div>
                <div class="small fw-semibold py-2">
                    <i class="bi-translate"></i>
                    {{$season->language->name_tm}}
                </div>
                <div class="text-success fw-semibold py-1">
                    <i class="bi-camera-reels"></i>
                    {{$season->episodes_count}}
                </div>
            </div>
        </div>
    </a>
</div>