<div>
    <ul>
        @foreach($services as $service)
        <?php
        $checked = false;

        if ($checkedServices->isNotEmpty()) {
            $checked = $checkedServices->contains($service->serviceId);
        }
        ?>
        <li class="text-left">
            {{Form::checkbox('services[]', $service->serviceId, $checked, ['id' => $service->name])}}
            {{ Form::label($service->name, $service->name) }}
        </li>
        
        @endforeach
    </ul>
</div>