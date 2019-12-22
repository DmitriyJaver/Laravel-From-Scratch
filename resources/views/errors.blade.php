@if($errors->any())
    @error('description')
    <div class="notification is-danger">{{ $message }}</div>
    @enderror
    {{--          @if($errors->any())
                  <div class="notification is-danger">
                      <ul>
                          @foreach($errors->all() as $error)
                              <li>
                                  {{$error}}
                              </li>
                      </ul>
                  </div>

              @endif
  --}}
@endif
