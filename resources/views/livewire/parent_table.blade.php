<div class="table-responsive">

    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="button" wire:click="showform">
    {{trans('Parent.add_parent')}}
</button>
    <table class="table text-md-nowrap" id="example1" data-page-length="50">
        <thead>
            <tr>
                <th class="wd-5p border-bottom-0">#</th>
                <th class="wd-15p border-bottom-0">{{ trans('parent.name_father')}}</th>
                <th class="wd-15p border-bottom-0"> {{ trans('parent.name_mother')}}</th>
                <th class="wd-15p border-bottom-0">{{ trans('parent.Email')}}</th>
                <th class="wd-15p border-bottom-0">{{ trans('parent.Phone_Father')}}</th>
                <th class="wd-15p border-bottom-0">{{ trans('parent.Address_Father')}}</th>
                <th class="wd-15p border-bottom-0">{{ trans('parent.status_father')}}</th>
                <th class="wd-20p border-bottom-0">{{ trans('parent.status_mother')}}</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
       @foreach ($parents as $parent)
           
      
            <?php $i++ ; ?>
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $parent->Name_Father}}</td>
                <td>{{ $parent->Name_Mother }}</td>
                <td>{{ $parent->Email }}</td>
                <td>{{ $parent->Phone_Father }}</td>
                <td>{{ $parent->Address_Father }}</td>
                <td>{{ $parent->status_father_id}}</td>
                <td>{{ $parent->status_Mother_id}}</td>
                <td> 
                    <button wire:click="edit({{ $parent->id }})" title="{{ trans('Grades_trans.Edit') }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $parent->id }})" title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                </td>
                

            </tr>
       @endforeach
      </tbody>
    </table>




</div>