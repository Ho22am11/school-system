
@if($currentStep != 1)
<div style="display: none" class="row setup-content" id="step-1">
@endif
<div class="col-xs-12">
    
    @if ($successMessage)
    <div class="alert alert-success" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{ $successMessage }}
    </div>
    @endif
<div class="col-md-12" wire:poll.2000ms >
   
         <br>
         <div class="form-row"  >
            <div class="col" >
                <label for="title">{{trans('Parent.Email')}}</label>
                <input type="email" wire:model="Email"  class="form-control">
                @error('Email')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
            </div>
             <div class="col">
                 <label for="title">{{trans('parent.Password')}}</label>
                 <input type="password" wire:model="Password" class="form-control" >
                 @error('Password')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
         </div>

         <div class="form-row">
             <div class="col">
                 <label for="title">{{trans('parent.Name_Father')}}</label>
                 <input type="text" wire:model="Name_Father" class="form-control" >
                 @error('Name_Father')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
             <div class="col">
                 <label for="title">{{trans('parent.Name_Father_en')}}</label>
                 <input type="text" wire:model="Name_Father_en" class="form-control" >
                 @error('Name_Father_en')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
         </div>

         <div class="form-row">
             <div class="col-md-3">
                 <label for="title">{{trans('parent.Job_Father')}}</label>
                 <input type="text" wire:model="Job_Father" class="form-control">
                 @error('Job_Father')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
             <div class="col-md-3">
                 <label for="title">{{trans('parent.Job_Father_en')}}</label>
                 <input type="text" wire:model="Job_Father_en" class="form-control">
                 @error('Job_Father_en')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>

             <div class="col">
                 <label for="title">{{trans('parent.National_ID_Father')}}</label>
                 <input type="text" wire:model="National_ID_Father" class="form-control">
                 @error('National_ID_Father')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
          

             <div class="col">
                 <label for="title">{{trans('parent.Phone_Father')}}</label>
                 <input type="text" wire:model="Phone_Father" class="form-control">
                 @error('Phone_Father')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>

         </div>


         <div class="form-row">
             <div class="form-group col-md-6">
                 <label for="inputCity">{{trans('parent.Nationality_Father_id')}}</label>
                 <select class="custom-select my-1 mr-sm-2" wire:model="Nationality_Father_id">
                     <option selected>{{trans('parent.Choose')}}...</option>
                     @foreach($Nationalities as $National)
                         <option value="{{$National->id}}">{{$National->name}}</option>
                     @endforeach
                 
                 </select>
                 @error('Nationality_Father_id')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
             <div class="form-group col">
                 <label for="inputState">{{trans('parent.status_father')}}</label>
                 <select class="custom-select my-1 mr-sm-2" wire:model="status_father">
                     <option selected>{{trans('parent.Choose')}}...</option>
                     @foreach ($statuses as $status)
                     <option value="{{$status->id}}">{{$status->name}}</option>
                 @endforeach

                  
                 </select>
                 @error('status_father')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                 </div>
             <div class="form-group col">
                 <label for="inputZip">{{trans('parent.Religion_Father_id')}}</label>
                 <select class="custom-select my-1 mr-sm-2" wire:model="Religion_Father_id">
                     <option selected>{{trans('parent.Choose')}}...</option>
                     @foreach($Religions as $Religion)
                     <option value="{{$Religion->id}}">{{$Religion->name}}</option>
                 @endforeach
                   
                 </select>
                 @error('Religion_Father_id')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
         </div>


         <div class="form-group">
             <label for="exampleFormControlTextarea1">{{trans('parent.Address_Father')}}</label>
             <textarea class="form-control" wire:model="Address_Father" id="exampleFormControlTextarea1" rows="4"></textarea>
             @error('Address_Father')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
         </div>

        
       
          
       
   

     
</div>

<button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit(2)" type="button">{{trans('parent.Next')}}
</button>
</div>