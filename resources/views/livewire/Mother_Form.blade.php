@if($currentStep != 2)
   <div style="display: none" class="row setup-content" id="step-2">
@endif
<div class="col-xs-12">
<div class="col-md-12" >
         <br>
         

         <div class="form-row">
             <div class="col">
                 <label for="title">{{trans('parent.Name_Mother')}}</label>
                 <input type="text" wire:model="Name_Mother" class="form-control" >
                 @error('Name_Mother')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
             <div class="col">
                 <label for="title">{{trans('parent.Name_Mother_en')}}</label>
                 <input type="text" wire:model="Name_Mother_en" class="form-control" >
                 @error('Name_Mother_en')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
         </div>

         <div class="form-row">
             <div class="col-md-3">
                 <label for="title">{{trans('parent.Job_Mother')}}</label>
                 <input type="text" wire:model="Job_Mother" class="form-control">
                 @error('Job_Mother')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
             <div class="col-md-3">
                 <label for="title">{{trans('parent.Job_Mother_en')}}</label>
                 <input type="text" wire:model="Job_Mother_en" class="form-control">
                 @error('Job_Mother_en')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>

             <div class="col">
                 <label for="title">{{trans('parent.National_ID_Mother')}}</label>
                 <input type="text" wire:model="National_ID_Mother" class="form-control">
                 @error('National_ID_Mother')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
          

             <div class="col">
                 <label for="title">{{trans('parent.Phone_Mother')}}</label>
                 <input type="text" wire:model="Phone_Mother" class="form-control">
                 @error('Phone_Mother')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>

         </div>


         <div class="form-row">
             <div class="form-group col-md-6">
                 <label for="inputCity">{{trans('parent.Nationality_Father_id')}}</label>
                 <select class="custom-select my-1 mr-sm-2" wire:model="Nationality_Mother_id">
                     <option selected>{{trans('parent.Choose')}}...</option>
                     @foreach($Nationalities as $National)
                         <option value="{{$National->id}}">{{$National->name}}</option>
                     @endforeach
                 
                 </select>
                 @error('Nationality_Mother_id')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>


             <div class="form-group col">
                 <label for="inputState">{{trans('parent.status_mother')}}</label>
                 <select class="custom-select my-1 mr-sm-2" wire:model="status_Mother">
                     <option selected>{{trans('parent.Choose')}}...</option>
                     @foreach ($statuses as $status)
                     <option value="{{$status->id}}">{{$status->name}}</option>
                 @endforeach
                 </select>
                 @error('status_Mother')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
                 </div>


                 
             <div class="form-group col">
                 <label for="inputZip">{{trans('parent.Religion_Father_id')}}</label>
                 <select class="custom-select my-1 mr-sm-2" wire:model="Religion_Mother_id">
                     <option selected>{{trans('parent.Choose')}}...</option>
                     @foreach($Religions as $Religion)
                     <option value="{{$Religion->id}}">{{$Religion->name}}</option>
                 @endforeach
                   
                 </select>
                 @error('Religion_Mother_id')
                 <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
             </div>
         </div>


         <div class="form-group">
             <label for="exampleFormControlTextarea1">{{trans('parent.Address_Mother')}}</label>
             <textarea class="form-control" wire:model="Address_Mother" id="exampleFormControlTextarea1" rows="4"></textarea>
             @error('Address_Mother')
             <div class="alert alert-danger">{{ $message }}</div>
             @enderror
         </div>

        
       
          
       
   

     
</div>
<button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(1)">
    {{trans('Parent.Back')}}
</button>
<button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="secundStepSubmit(3)" type="button">{{trans('parent.Next')}} </button>
</div>
</div>