<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>




</tr>
<tr><th colspan="2">FATHER NAME</th>
<td colspam="2"><?= $data['father'];?></td>
</tr>
<tr><th colspan="2">MOTHER NAME</th>
<td colspam="2"><?= $data['mother'];?></td>
</tr>
<tr><th colspan="2">SCHOOL NAME</th>
<td colspam="2"><?= $data['school'];?></td>
</tr>
<tr><th colspan="2">ADDRESS</th>
<td colspam="2"><?= $data['address'];?></td>
</tr>
<tr><th colspan="2">EMAIL</th>
<td colspam="2"><?= $data['email'];?></td>
</tr>
<tr><th colspan="2">CONTACT</th>
<td colspam="2"><?= $data['contact'];?></td>
</tr>
<tr class="bg-danger text-white text-center mb-5">
<th colspan="4">MARKS DETAILS</th>
</tr>
<tr>
<th>SUBJECT</th>
<th>TOTAL MARKS</th>
<th>PASS MARKS</th>
<th>OBTAIN MARKS</th>
</tr>
<tr>
<th>MATHS</th>
<td>100</td>
<td>30</td>
<td><?= $data['maths']; ?><?= ($data['maths']<30)? "F" : "";?></td>
</tr>
<tr>
<th>SCIENCE</th>
<td>100</td>
<td>30</td>
<td><?= $data['science']; ?><?= ($data['science'] <30)?"F":"";?></td>
</tr>
<tr>
<th>SST</th>
<td>100</td>
<td>30</td>
<td><?= $data['sst']; ?><?= ($data['sst']<30 )? "F":"";?></td>
</tr>
<tr>
<th>ENGLISH</th>
<td>100</td>
<td>30</td>
<td><?= $data['english']; ?><?= ($data['english']<30 )? "F":"";?></td>
</tr>
<tr>
<th>HINDI</th>
<td>100</td>
<td>30</td>
<td><?= $data['hindi'];?> <?= ($data['hindi'] < 30 )? "F" : "";?></td>
</tr>
<tr class="bg-success text-white text-center mt-3">
<th colspan="4">RESULT DETAILS</th>
</tr>
<tr>
<th colspan="2">TOTAL MARKS</th>
<td colspan="2"><?= $total = $data['maths'] + $data['science'] + $data['sst'] + $data['english'] + $data['hindi'] ;?></td>
</tr>
<tr>
<th colspan="2">DIVISION</th>
<th colspan="2"><?= ($total >=300 && $result == 0)? "1st Division": (($total >=250 && $result == 0)? "2nd Division": (($total >=150 && $result == 0)? "3rd Division": "fail")); ?> </th>
</tr>