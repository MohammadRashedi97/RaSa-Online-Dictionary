<div class="text-center text-white" id="search-box">
     <br><br>
     <h3 class="text-center" style="margin-bottom: 15px;">Search for something</h3>
     {{-- We use GET method for search --}}
     <form action="{{ route('search') }}" method="GET" id="search-form">
          <div class="search-widget">
               <div class="input-group">
                    {{-- Search Input - we use request('term') for search route --}}
                    <input type="text" class="form-control input-lg ml-5" value="{{request('term')}}"
                         name="term" placeholder="Search for a word" id="search">
                    <span class="input-group-btn">
                         <button class="btn btn-lg btn-default" type="submit">
                              <i class="fa fa-search text-primary"></i>
                         </button>
                    </span>
               </div>
               <br>
               <div class="form-check form-check-inline">
                    <input class="form-check-input radioButton" type="radio" name="translation-options" id="english-persian" value="english-persian" checked>
                    <label class="form-check-label" for="english-persian">انگلیسی به فارسی</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input radioButton" type="radio" name="translation-options" id="persian-english" value="persian-english">
                    <label class="form-check-label" for="persian-english">فارسی به انگلیسی</label>
                  </div>
          </div>
     </form>
     <br><br>
</div>