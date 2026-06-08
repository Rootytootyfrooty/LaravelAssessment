<div class="flex gap-3 max-w-full flex-wrap mx-auto justify-center">
    <a class="btn" href="{{ request()->fullUrlWithQuery(['sort' => 'latest']) }}">Sort by Latest</a>
    <a class="btn" href="{{ request()->fullUrlWithQuery(['sort' => 'oldest']) }}">Sort by Oldest</a>
    <div id="more-options-btn" class="btn bg-gray-700 flex items-center justify-center md:order-12"><p>Show more options</p>
        <span class="mt-2 md:-rotate-90 md:mt-1 md:ml-1">&#129175;</span>
    </div>
    <div id="more-options" class="flex flex-wrap justify-center gap-3 hidden">
        <a class="btn" href="{{ request()->fullUrlWithQuery(['sort' => 'aToZ']) }}">Sort by A-Z</a>
        <a class="btn" href="{{ request()->fullUrlWithQuery(['sort' => 'zToA']) }}">Sort by Z-A</a>
        <a class="btn" href="{{ request()->fullUrlWithQuery(['sort' => 'byCompany']) }}">Sort by Company</a>
    </div>
</div>