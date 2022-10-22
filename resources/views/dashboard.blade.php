<x-app-layout>
    <div class="row">
        <div class="col-xl-12">
            <div class="card" id="user-activity">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#session" role="tab" aria-controls=""
                           aria-selected="false">
                            <div class="icon-wrap success">
                                <i class="mdi mdi-airballoon"></i>
                            </div>
                            <h4>{{ \App\Models\Brand::count() }}</h4>
                            <span class="type-name">Total Brands</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#bounce" role="tab" aria-controls=""
                           aria-selected="false">
                            <div class="icon-wrap info">
                                <i class="mdi mdi-trophy"></i>
                            </div>
                            <h4>{{ \App\Models\ModelItem::count() }}</h4>
                            <span class="type-name">Total Models</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#session-duration" role="tab"
                           aria-controls="" aria-selected="false">
                            <div class="icon-wrap danger">
                                <i class="mdi mdi-clock"></i>
                            </div>
                            <h4>{{ \App\Models\Item::count() }}</h4>
                            <span class="type-name">Total Items</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
