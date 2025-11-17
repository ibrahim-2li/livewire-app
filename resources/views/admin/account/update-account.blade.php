<div>
    <div class="card mb-4">
        <h5 class="card-header">@lang('Profile Details')</h5>
        <!-- Account -->
        {{-- @livewire('admin.account.update-account-image') --}}
        <hr class="my-0" />
        <div class="card-body">
            <form wire:submit.prevent='submit'>
                @if (session()->has('message'))
                    <div class="alert alert-success my-success-alert">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label class="form-label">@lang('Name')</label>
                        <input class="form-control" type="text" wire:model='user.name'
                            placeholder="@lang('Name')" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label">@lang('Email')</label>
                        <input class="form-control" type="text" wire:model='user.email'
                            placeholder="john.doe@example.com" />
                    </div>
                    {{-- <div class="input-group input-group-merge">
                        <input type="tel" maxlength="13" pattern="\+966\d{9}" inputmode="tel"
                            id="phone" name="phone" value="{{ old('phone') }}"
                            class="form-control form-control w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-300"
                            placeholder="@lang('Please enter your phone number with country code')" required />
                    </div> --}}
                    <div class="mb-3 col-md-6">
                        <label class="form-label">@lang('Phone Number')</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">(+)</span>
                            <input class="form-control" wire:model='user.phone' placeholder="+966500 000 000"
                                type="tel" maxlength="13" pattern="\+\00\d{7,14}" inputmode="tel" />
                        </div>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="job_title" class="form-label">@lang('Job Title')</label>
                        <input type="text" class="form-control" wire:model='user.job_title' placeholder="Manager" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="gender" class="form-label">@lang('Gender')</label>
                        <select class="form-control" wire:model='user.gender'>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="job_title" class="form-label">@lang('Nationality')</label>
                        <div>
                            <select wire:model='user.nationality' class="form-control" required>
                                <option value="">@lang('Nationality or home country')</option>
                                <option value="Afghanistan"
                                    {{ old('nationality', session('nationality')) == 'Afghanistan' ? 'selected' : '' }}>
                                    @lang('Afghanistan')</option>
                                <option value="Albania"
                                    {{ old('nationality', session('nationality')) == 'Albania' ? 'selected' : '' }}>
                                    @lang('Albania')</option>
                                <option value="Algeria"
                                    {{ old('nationality', session('nationality')) == 'Algeria' ? 'selected' : '' }}>
                                    @lang('Algeria')</option>
                                <option value="Andorra"
                                    {{ old('nationality', session('nationality')) == 'Andorra' ? 'selected' : '' }}>
                                    @lang('Andorra')</option>
                                <option value="Angola"
                                    {{ old('nationality', session('nationality')) == 'Angola' ? 'selected' : '' }}>
                                    @lang('Angola')</option>
                                <option value="Antigua and Barbuda"
                                    {{ old('nationality', session('nationality')) == 'Antigua and Barbuda' ? 'selected' : '' }}>
                                    @lang('Antigua and Barbuda')</option>
                                <option value="Argentina"
                                    {{ old('nationality', session('nationality')) == 'Argentina' ? 'selected' : '' }}>
                                    @lang('Argentina')</option>
                                <option value="Armenia"
                                    {{ old('nationality', session('nationality')) == 'Armenia' ? 'selected' : '' }}>
                                    @lang('Armenia')</option>
                                <option value="Australia"
                                    {{ old('nationality', session('nationality')) == 'Australia' ? 'selected' : '' }}>
                                    @lang('Australia')</option>
                                <option value="Austria"
                                    {{ old('nationality', session('nationality')) == 'Austria' ? 'selected' : '' }}>
                                    @lang('Austria')</option>
                                <option value="Azerbaijan"
                                    {{ old('nationality', session('nationality')) == 'Azerbaijan' ? 'selected' : '' }}>
                                    @lang('Azerbaijan')</option>
                                <option value="Bahamas"
                                    {{ old('nationality', session('nationality')) == 'Bahamas' ? 'selected' : '' }}>
                                    @lang('Bahamas')</option>
                                <option value="Bahrain"
                                    {{ old('nationality', session('nationality')) == 'Bahrain' ? 'selected' : '' }}>
                                    @lang('Bahrain')</option>
                                <option value="Bangladesh"
                                    {{ old('nationality', session('nationality')) == 'Bangladesh' ? 'selected' : '' }}>
                                    @lang('Bangladesh')</option>
                                <option value="Barbados"
                                    {{ old('nationality', session('nationality')) == 'Barbados' ? 'selected' : '' }}>
                                    @lang('Barbados')</option>
                                <option value="Belarus"
                                    {{ old('nationality', session('nationality')) == 'Belarus' ? 'selected' : '' }}>
                                    @lang('Belarus')</option>
                                <option value="Belgium"
                                    {{ old('nationality', session('nationality')) == 'Belgium' ? 'selected' : '' }}>
                                    @lang('Belgium')</option>
                                <option value="Belize"
                                    {{ old('nationality', session('nationality')) == 'Belize' ? 'selected' : '' }}>
                                    @lang('Belize')</option>
                                <option value="Benin"
                                    {{ old('nationality', session('nationality')) == 'Benin' ? 'selected' : '' }}>
                                    @lang('Benin')</option>
                                <option value="Bhutan"
                                    {{ old('nationality', session('nationality')) == 'Bhutan' ? 'selected' : '' }}>
                                    @lang('Bhutan')</option>
                                <option value="Bolivia"
                                    {{ old('nationality', session('nationality')) == 'Bolivia' ? 'selected' : '' }}>
                                    @lang('Bolivia')</option>
                                <option value="Bosnia and Herzegovina"
                                    {{ old('nationality', session('nationality')) == 'Bosnia and Herzegovina' ? 'selected' : '' }}>
                                    @lang('Bosnia and Herzegovina')</option>
                                <option value="Botswana"
                                    {{ old('nationality', session('nationality')) == 'Botswana' ? 'selected' : '' }}>
                                    @lang('Botswana')</option>
                                <option value="Brazil"
                                    {{ old('nationality', session('nationality')) == 'Brazil' ? 'selected' : '' }}>
                                    @lang('Brazil')</option>
                                <option value="Brunei"
                                    {{ old('nationality', session('nationality')) == 'Brunei' ? 'selected' : '' }}>
                                    @lang('Brunei')</option>
                                <option value="Bulgaria"
                                    {{ old('nationality', session('nationality')) == 'Bulgaria' ? 'selected' : '' }}>
                                    @lang('Bulgaria')</option>
                                <option value="Burkina Faso"
                                    {{ old('nationality', session('nationality')) == 'Burkina Faso' ? 'selected' : '' }}>
                                    @lang('Burkina Faso')</option>
                                <option value="Burundi"
                                    {{ old('nationality', session('nationality')) == 'Burundi' ? 'selected' : '' }}>
                                    @lang('Burundi')</option>
                                <option value="Cabo Verde"
                                    {{ old('nationality', session('nationality')) == 'Cabo Verde' ? 'selected' : '' }}>
                                    @lang('Cabo Verde')</option>
                                <option value="Cambodia"
                                    {{ old('nationality', session('nationality')) == 'Cambodia' ? 'selected' : '' }}>
                                    @lang('Cambodia')</option>
                                <option value="Cameroon"
                                    {{ old('nationality', session('nationality')) == 'Cameroon' ? 'selected' : '' }}>
                                    @lang('Cameroon')</option>
                                <option value="Canada"
                                    {{ old('nationality', session('nationality')) == 'Canada' ? 'selected' : '' }}>
                                    @lang('Canada')</option>
                                <option value="Central African Republic"
                                    {{ old('nationality', session('nationality')) == 'Central African Republic' ? 'selected' : '' }}>
                                    @lang('Central African Republic')</option>
                                <option value="Chad"
                                    {{ old('nationality', session('nationality')) == 'Chad' ? 'selected' : '' }}>
                                    @lang('Chad')</option>
                                <option value="Chile"
                                    {{ old('nationality', session('nationality')) == 'Chile' ? 'selected' : '' }}>
                                    @lang('Chile')</option>
                                <option value="China"
                                    {{ old('nationality', session('nationality')) == 'China' ? 'selected' : '' }}>
                                    @lang('China')</option>
                                <option value="Colombia"
                                    {{ old('nationality', session('nationality')) == 'Colombia' ? 'selected' : '' }}>
                                    @lang('Colombia')</option>
                                <option value="Comoros"
                                    {{ old('nationality', session('nationality')) == 'Comoros' ? 'selected' : '' }}>
                                    @lang('Comoros')</option>
                                <option value="Congo"
                                    {{ old('nationality', session('nationality')) == 'Congo' ? 'selected' : '' }}>
                                    @lang('Congo')</option>
                                <option value="Costa Rica"
                                    {{ old('nationality', session('nationality')) == 'Costa Rica' ? 'selected' : '' }}>
                                    @lang('Costa Rica')</option>
                                <option value="Croatia"
                                    {{ old('nationality', session('nationality')) == 'Croatia' ? 'selected' : '' }}>
                                    @lang('Croatia')</option>
                                <option value="Cuba"
                                    {{ old('nationality', session('nationality')) == 'Cuba' ? 'selected' : '' }}>
                                    @lang('Cuba')</option>
                                <option value="Cyprus"
                                    {{ old('nationality', session('nationality')) == 'Cyprus' ? 'selected' : '' }}>
                                    @lang('Cyprus')</option>
                                <option value="Czech Republic"
                                    {{ old('nationality', session('nationality')) == 'Czech Republic' ? 'selected' : '' }}>
                                    @lang('Czech Republic')</option>
                                <option value="Denmark"
                                    {{ old('nationality', session('nationality')) == 'Denmark' ? 'selected' : '' }}>
                                    @lang('Denmark')</option>
                                <option value="Djibouti"
                                    {{ old('nationality', session('nationality')) == 'Djibouti' ? 'selected' : '' }}>
                                    @lang('Djibouti')</option>
                                <option value="Dominica"
                                    {{ old('nationality', session('nationality')) == 'Dominica' ? 'selected' : '' }}>
                                    @lang('Dominica')</option>
                                <option value="Dominican Republic"
                                    {{ old('nationality', session('nationality')) == 'Dominican Republic' ? 'selected' : '' }}>
                                    @lang('Dominican Republic')</option>
                                <option value="Ecuador"
                                    {{ old('nationality', session('nationality')) == 'Ecuador' ? 'selected' : '' }}>
                                    @lang('Ecuador')</option>
                                <option value="Egypt"
                                    {{ old('nationality', session('nationality')) == 'Egypt' ? 'selected' : '' }}>
                                    @lang('Egypt')</option>
                                <option value="El Salvador"
                                    {{ old('nationality', session('nationality')) == 'El Salvador' ? 'selected' : '' }}>
                                    @lang('El Salvador')</option>
                                <option value="Equatorial Guinea"
                                    {{ old('nationality', session('nationality')) == 'Equatorial Guinea' ? 'selected' : '' }}>
                                    @lang('Equatorial Guinea')</option>
                                <option value="Eritrea"
                                    {{ old('nationality', session('nationality')) == 'Eritrea' ? 'selected' : '' }}>
                                    @lang('Eritrea')</option>
                                <option value="Estonia"
                                    {{ old('nationality', session('nationality')) == 'Estonia' ? 'selected' : '' }}>
                                    @lang('Estonia')</option>
                                <option value="Eswatini"
                                    {{ old('nationality', session('nationality')) == 'Eswatini' ? 'selected' : '' }}>
                                    @lang('Eswatini')</option>
                                <option value="Ethiopia"
                                    {{ old('nationality', session('nationality')) == 'Ethiopia' ? 'selected' : '' }}>
                                    @lang('Ethiopia')</option>
                                <option value="Fiji"
                                    {{ old('nationality', session('nationality')) == 'Fiji' ? 'selected' : '' }}>
                                    @lang('Fiji')</option>
                                <option value="Finland"
                                    {{ old('nationality', session('nationality')) == 'Finland' ? 'selected' : '' }}>
                                    @lang('Finland')</option>
                                <option value="France"
                                    {{ old('nationality', session('nationality')) == 'France' ? 'selected' : '' }}>
                                    @lang('France')</option>
                                <option value="Gabon"
                                    {{ old('nationality', session('nationality')) == 'Gabon' ? 'selected' : '' }}>
                                    @lang('Gabon')</option>
                                <option value="Gambia"
                                    {{ old('nationality', session('nationality')) == 'Gambia' ? 'selected' : '' }}>
                                    @lang('Gambia')</option>
                                <option value="Georgia"
                                    {{ old('nationality', session('nationality')) == 'Georgia' ? 'selected' : '' }}>
                                    @lang('Georgia')</option>
                                <option value="Germany"
                                    {{ old('nationality', session('nationality')) == 'Germany' ? 'selected' : '' }}>
                                    @lang('Germany')</option>
                                <option value="Ghana"
                                    {{ old('nationality', session('nationality')) == 'Ghana' ? 'selected' : '' }}>
                                    @lang('Ghana')</option>
                                <option value="Greece"
                                    {{ old('nationality', session('nationality')) == 'Greece' ? 'selected' : '' }}>
                                    @lang('Greece')</option>
                                <option value="Grenada"
                                    {{ old('nationality', session('nationality')) == 'Grenada' ? 'selected' : '' }}>
                                    @lang('Grenada')</option>
                                <option value="Guatemala"
                                    {{ old('nationality', session('nationality')) == 'Guatemala' ? 'selected' : '' }}>
                                    @lang('Guatemala')</option>
                                <option value="Guinea"
                                    {{ old('nationality', session('nationality')) == 'Guinea' ? 'selected' : '' }}>
                                    @lang('Guinea')</option>
                                <option value="Guinea-Bissau"
                                    {{ old('nationality', session('nationality')) == 'Guinea-Bissau' ? 'selected' : '' }}>
                                    @lang('Guinea-Bissau')</option>
                                <option value="Guyana"
                                    {{ old('nationality', session('nationality')) == 'Guyana' ? 'selected' : '' }}>
                                    @lang('Guyana')</option>
                                <option value="Haiti"
                                    {{ old('nationality', session('nationality')) == 'Haiti' ? 'selected' : '' }}>
                                    @lang('Haiti')</option>
                                <option value="Honduras"
                                    {{ old('nationality', session('nationality')) == 'Honduras' ? 'selected' : '' }}>
                                    @lang('Honduras')</option>
                                <option value="Hungary"
                                    {{ old('nationality', session('nationality')) == 'Hungary' ? 'selected' : '' }}>
                                    @lang('Hungary')</option>
                                <option value="Iceland"
                                    {{ old('nationality', session('nationality')) == 'Iceland' ? 'selected' : '' }}>
                                    @lang('Iceland')</option>
                                <option value="India"
                                    {{ old('nationality', session('nationality')) == 'India' ? 'selected' : '' }}>
                                    @lang('India')</option>
                                <option value="Indonesia"
                                    {{ old('nationality', session('nationality')) == 'Indonesia' ? 'selected' : '' }}>
                                    @lang('Indonesia')</option>
                                <option value="Iran"
                                    {{ old('nationality', session('nationality')) == 'Iran' ? 'selected' : '' }}>
                                    @lang('Iran')</option>
                                <option value="Iraq"
                                    {{ old('nationality', session('nationality')) == 'Iraq' ? 'selected' : '' }}>
                                    @lang('Iraq')</option>
                                <option value="Ireland"
                                    {{ old('nationality', session('nationality')) == 'Ireland' ? 'selected' : '' }}>
                                    @lang('Ireland')</option>
                                <option value="Israel"
                                    {{ old('nationality', session('nationality')) == 'Israel' ? 'selected' : '' }}>
                                    @lang('Israel')</option>
                                <option value="Italy"
                                    {{ old('nationality', session('nationality')) == 'Italy' ? 'selected' : '' }}>
                                    @lang('Italy')</option>
                                <option value="Jamaica"
                                    {{ old('nationality', session('nationality')) == 'Jamaica' ? 'selected' : '' }}>
                                    @lang('Jamaica')</option>
                                <option value="Japan"
                                    {{ old('nationality', session('nationality')) == 'Japan' ? 'selected' : '' }}>
                                    @lang('Japan')</option>
                                <option value="Jordan"
                                    {{ old('nationality', session('nationality')) == 'Jordan' ? 'selected' : '' }}>
                                    @lang('Jordan')</option>
                                <option value="Kazakhstan"
                                    {{ old('nationality', session('nationality')) == 'Kazakhstan' ? 'selected' : '' }}>
                                    @lang('Kazakhstan')</option>
                                <option value="Kenya"
                                    {{ old('nationality', session('nationality')) == 'Kenya' ? 'selected' : '' }}>
                                    @lang('Kenya')</option>
                                <option value="Kiribati"
                                    {{ old('nationality', session('nationality')) == 'Kiribati' ? 'selected' : '' }}>
                                    @lang('Kiribati')</option>
                                <option value="Kosovo"
                                    {{ old('nationality', session('nationality')) == 'Kosovo' ? 'selected' : '' }}>
                                    @lang('Kosovo')</option>
                                <option value="Kuwait"
                                    {{ old('nationality', session('nationality')) == 'Kuwait' ? 'selected' : '' }}>
                                    @lang('Kuwait')</option>
                                <option value="Kyrgyzstan"
                                    {{ old('nationality', session('nationality')) == 'Kyrgyzstan' ? 'selected' : '' }}>
                                    @lang('Kyrgyzstan')</option>
                                <option value="Laos"
                                    {{ old('nationality', session('nationality')) == 'Laos' ? 'selected' : '' }}>
                                    @lang('Laos')</option>
                                <option value="Latvia"
                                    {{ old('nationality', session('nationality')) == 'Latvia' ? 'selected' : '' }}>
                                    @lang('Latvia')</option>
                                <option value="Lebanon"
                                    {{ old('nationality', session('nationality')) == 'Lebanon' ? 'selected' : '' }}>
                                    @lang('Lebanon')</option>
                                <option value="Lesotho"
                                    {{ old('nationality', session('nationality')) == 'Lesotho' ? 'selected' : '' }}>
                                    @lang('Lesotho')</option>
                                <option value="Liberia"
                                    {{ old('nationality', session('nationality')) == 'Liberia' ? 'selected' : '' }}>
                                    @lang('Liberia')</option>
                                <option value="Libya"
                                    {{ old('nationality', session('nationality')) == 'Libya' ? 'selected' : '' }}>
                                    @lang('Libya')</option>
                                <option value="Liechtenstein"
                                    {{ old('nationality', session('nationality')) == 'Liechtenstein' ? 'selected' : '' }}>
                                    @lang('Liechtenstein')</option>
                                <option value="Lithuania"
                                    {{ old('nationality', session('nationality')) == 'Lithuania' ? 'selected' : '' }}>
                                    @lang('Lithuania')</option>
                                <option value="Luxembourg"
                                    {{ old('nationality', session('nationality')) == 'Luxembourg' ? 'selected' : '' }}>
                                    @lang('Luxembourg')</option>
                                <option value="Madagascar"
                                    {{ old('nationality', session('nationality')) == 'Madagascar' ? 'selected' : '' }}>
                                    @lang('Madagascar')</option>
                                <option value="Malawi"
                                    {{ old('nationality', session('nationality')) == 'Malawi' ? 'selected' : '' }}>
                                    @lang('Malawi')</option>
                                <option value="Malaysia"
                                    {{ old('nationality', session('nationality')) == 'Malaysia' ? 'selected' : '' }}>
                                    @lang('Malaysia')</option>
                                <option value="Maldives"
                                    {{ old('nationality', session('nationality')) == 'Maldives' ? 'selected' : '' }}>
                                    @lang('Maldives')</option>
                                <option value="Mali"
                                    {{ old('nationality', session('nationality')) == 'Mali' ? 'selected' : '' }}>
                                    @lang('Mali')</option>
                                <option value="Malta"
                                    {{ old('nationality', session('nationality')) == 'Malta' ? 'selected' : '' }}>
                                    @lang('Malta')</option>
                                <option value="Marshall Islands"
                                    {{ old('nationality', session('nationality')) == 'Marshall Islands' ? 'selected' : '' }}>
                                    @lang('Marshall Islands')</option>
                                <option value="Mauritania"
                                    {{ old('nationality', session('nationality')) == 'Mauritania' ? 'selected' : '' }}>
                                    @lang('Mauritania')</option>
                                <option value="Mauritius"
                                    {{ old('nationality', session('nationality')) == 'Mauritius' ? 'selected' : '' }}>
                                    @lang('Mauritius')</option>
                                <option value="Mexico"
                                    {{ old('nationality', session('nationality')) == 'Mexico' ? 'selected' : '' }}>
                                    @lang('Mexico')</option>
                                <option value="Micronesia"
                                    {{ old('nationality', session('nationality')) == 'Micronesia' ? 'selected' : '' }}>
                                    @lang('Micronesia')</option>
                                <option value="Moldova"
                                    {{ old('nationality', session('nationality')) == 'Moldova' ? 'selected' : '' }}>
                                    @lang('Moldova')</option>
                                <option value="Monaco"
                                    {{ old('nationality', session('nationality')) == 'Monaco' ? 'selected' : '' }}>
                                    @lang('Monaco')</option>
                                <option value="Mongolia"
                                    {{ old('nationality', session('nationality')) == 'Mongolia' ? 'selected' : '' }}>
                                    @lang('Mongolia')</option>
                                <option value="Montenegro"
                                    {{ old('nationality', session('nationality')) == 'Montenegro' ? 'selected' : '' }}>
                                    @lang('Montenegro')</option>
                                <option value="Morocco"
                                    {{ old('nationality', session('nationality')) == 'Morocco' ? 'selected' : '' }}>
                                    @lang('Morocco')</option>
                                <option value="Mozambique"
                                    {{ old('nationality', session('nationality')) == 'Mozambique' ? 'selected' : '' }}>
                                    @lang('Mozambique')</option>
                                <option value="Myanmar"
                                    {{ old('nationality', session('nationality')) == 'Myanmar' ? 'selected' : '' }}>
                                    @lang('Myanmar')</option>
                                <option value="Namibia"
                                    {{ old('nationality', session('nationality')) == 'Namibia' ? 'selected' : '' }}>
                                    @lang('Namibia')</option>
                                <option value="Nauru"
                                    {{ old('nationality', session('nationality')) == 'Nauru' ? 'selected' : '' }}>
                                    @lang('Nauru')</option>
                                <option value="Nepal"
                                    {{ old('nationality', session('nationality')) == 'Nepal' ? 'selected' : '' }}>
                                    @lang('Nepal')</option>
                                <option value="Netherlands"
                                    {{ old('nationality', session('nationality')) == 'Netherlands' ? 'selected' : '' }}>
                                    @lang('Netherlands')</option>
                                <option value="New Zealand"
                                    {{ old('nationality', session('nationality')) == 'New Zealand' ? 'selected' : '' }}>
                                    @lang('New Zealand')</option>
                                <option value="Nicaragua"
                                    {{ old('nationality', session('nationality')) == 'Nicaragua' ? 'selected' : '' }}>
                                    @lang('Nicaragua')</option>
                                <option value="Niger"
                                    {{ old('nationality', session('nationality')) == 'Niger' ? 'selected' : '' }}>
                                    @lang('Niger')</option>
                                <option value="Nigeria"
                                    {{ old('nationality', session('nationality')) == 'Nigeria' ? 'selected' : '' }}>
                                    @lang('Nigeria')</option>
                                <option value="North Korea"
                                    {{ old('nationality', session('nationality')) == 'North Korea' ? 'selected' : '' }}>
                                    @lang('North Korea')</option>
                                <option value="North Macedonia"
                                    {{ old('nationality', session('nationality')) == 'North Macedonia' ? 'selected' : '' }}>
                                    @lang('North Macedonia')</option>
                                <option value="Norway"
                                    {{ old('nationality', session('nationality')) == 'Norway' ? 'selected' : '' }}>
                                    @lang('Norway')</option>
                                <option value="Oman"
                                    {{ old('nationality', session('nationality')) == 'Oman' ? 'selected' : '' }}>
                                    @lang('Oman')</option>
                                <option value="Pakistan"
                                    {{ old('nationality', session('nationality')) == 'Pakistan' ? 'selected' : '' }}>
                                    @lang('Pakistan')</option>
                                <option value="Palau"
                                    {{ old('nationality', session('nationality')) == 'Palau' ? 'selected' : '' }}>
                                    @lang('Palau')</option>
                                <option value="Palestine"
                                    {{ old('nationality', session('nationality')) == 'Palestine' ? 'selected' : '' }}>
                                    @lang('Palestine')</option>
                                <option value="Panama"
                                    {{ old('nationality', session('nationality')) == 'Panama' ? 'selected' : '' }}>
                                    @lang('Panama')</option>
                                <option value="Papua New Guinea"
                                    {{ old('nationality', session('nationality')) == 'Papua New Guinea' ? 'selected' : '' }}>
                                    @lang('Papua New Guinea')</option>
                                <option value="Paraguay"
                                    {{ old('nationality', session('nationality')) == 'Paraguay' ? 'selected' : '' }}>
                                    @lang('Paraguay')</option>
                                <option value="Peru"
                                    {{ old('nationality', session('nationality')) == 'Peru' ? 'selected' : '' }}>
                                    @lang('Peru')</option>
                                <option value="Philippines"
                                    {{ old('nationality', session('nationality')) == 'Philippines' ? 'selected' : '' }}>
                                    @lang('Philippines')</option>
                                <option value="Poland"
                                    {{ old('nationality', session('nationality')) == 'Poland' ? 'selected' : '' }}>
                                    @lang('Poland')</option>
                                <option value="Portugal"
                                    {{ old('nationality', session('nationality')) == 'Portugal' ? 'selected' : '' }}>
                                    @lang('Portugal')</option>
                                <option value="Qatar"
                                    {{ old('nationality', session('nationality')) == 'Qatar' ? 'selected' : '' }}>
                                    @lang('Qatar')</option>
                                <option value="Romania"
                                    {{ old('nationality', session('nationality')) == 'Romania' ? 'selected' : '' }}>
                                    @lang('Romania')</option>
                                <option value="Russia"
                                    {{ old('nationality', session('nationality')) == 'Russia' ? 'selected' : '' }}>
                                    @lang('Russia')</option>
                                <option value="Rwanda"
                                    {{ old('nationality', session('nationality')) == 'Rwanda' ? 'selected' : '' }}>
                                    @lang('Rwanda')</option>
                                <option value="Saint Kitts and Nevis"
                                    {{ old('nationality', session('nationality')) == 'Saint Kitts and Nevis' ? 'selected' : '' }}>
                                    @lang('Saint Kitts and Nevis')</option>
                                <option value="Saint Lucia"
                                    {{ old('nationality', session('nationality')) == 'Saint Lucia' ? 'selected' : '' }}>
                                    @lang('Saint Lucia')</option>
                                <option value="Saint Vincent and the Grenadines"
                                    {{ old('nationality', session('nationality')) == 'Saint Vincent and the Grenadines' ? 'selected' : '' }}>
                                    @lang('Saint Vincent and the Grenadines')</option>
                                <option value="Samoa"
                                    {{ old('nationality', session('nationality')) == 'Samoa' ? 'selected' : '' }}>
                                    @lang('Samoa')</option>
                                <option value="San Marino"
                                    {{ old('nationality', session('nationality')) == 'San Marino' ? 'selected' : '' }}>
                                    @lang('San Marino')</option>
                                <option value="Sao Tome and Principe"
                                    {{ old('nationality', session('nationality')) == 'Sao Tome and Principe' ? 'selected' : '' }}>
                                    @lang('Sao Tome and Principe')</option>
                                <option value="Saudi Arabia"
                                    {{ old('nationality', session('nationality')) == 'Saudi Arabia' ? 'selected' : '' }}>
                                    @lang('Saudi Arabia')</option>
                                <option value="Senegal"
                                    {{ old('nationality', session('nationality')) == 'Senegal' ? 'selected' : '' }}>
                                    @lang('Senegal')</option>
                                <option value="Serbia"
                                    {{ old('nationality', session('nationality')) == 'Serbia' ? 'selected' : '' }}>
                                    @lang('Serbia')</option>
                                <option value="Seychelles"
                                    {{ old('nationality', session('nationality')) == 'Seychelles' ? 'selected' : '' }}>
                                    @lang('Seychelles')</option>
                                <option value="Sierra Leone"
                                    {{ old('nationality', session('nationality')) == 'Sierra Leone' ? 'selected' : '' }}>
                                    @lang('Sierra Leone')</option>
                                <option value="Singapore"
                                    {{ old('nationality', session('nationality')) == 'Singapore' ? 'selected' : '' }}>
                                    @lang('Singapore')</option>
                                <option value="Slovakia"
                                    {{ old('nationality', session('nationality')) == 'Slovakia' ? 'selected' : '' }}>
                                    @lang('Slovakia')</option>
                                <option value="Slovenia"
                                    {{ old('nationality', session('nationality')) == 'Slovenia' ? 'selected' : '' }}>
                                    @lang('Slovenia')</option>
                                <option value="Solomon Islands"
                                    {{ old('nationality', session('nationality')) == 'Solomon Islands' ? 'selected' : '' }}>
                                    @lang('Solomon Islands')</option>
                                <option value="Somalia"
                                    {{ old('nationality', session('nationality')) == 'Somalia' ? 'selected' : '' }}>
                                    @lang('Somalia')</option>
                                <option value="South Africa"
                                    {{ old('nationality', session('nationality')) == 'South Africa' ? 'selected' : '' }}>
                                    @lang('South Africa')</option>
                                <option value="South Korea"
                                    {{ old('nationality', session('nationality')) == 'South Korea' ? 'selected' : '' }}>
                                    @lang('South Korea')</option>
                                <option value="South Sudan"
                                    {{ old('nationality', session('nationality')) == 'South Sudan' ? 'selected' : '' }}>
                                    @lang('South Sudan')</option>
                                <option value="Spain"
                                    {{ old('nationality', session('nationality')) == 'Spain' ? 'selected' : '' }}>
                                    @lang('Spain')</option>
                                <option value="Sri Lanka"
                                    {{ old('nationality', session('nationality')) == 'Sri Lanka' ? 'selected' : '' }}>
                                    @lang('Sri Lanka')</option>
                                <option value="Sudan"
                                    {{ old('nationality', session('nationality')) == 'Sudan' ? 'selected' : '' }}>
                                    @lang('Sudan')</option>
                                <option value="Suriname"
                                    {{ old('nationality', session('nationality')) == 'Suriname' ? 'selected' : '' }}>
                                    @lang('Suriname')</option>
                                <option value="Sweden"
                                    {{ old('nationality', session('nationality')) == 'Sweden' ? 'selected' : '' }}>
                                    @lang('Sweden')</option>
                                <option value="Switzerland"
                                    {{ old('nationality', session('nationality')) == 'Switzerland' ? 'selected' : '' }}>
                                    @lang('Switzerland')</option>
                                <option value="Syria"
                                    {{ old('nationality', session('nationality')) == 'Syria' ? 'selected' : '' }}>
                                    @lang('Syria')</option>
                                <option value="Taiwan"
                                    {{ old('nationality', session('nationality')) == 'Taiwan' ? 'selected' : '' }}>
                                    @lang('Taiwan')</option>
                                <option value="Tajikistan"
                                    {{ old('nationality', session('nationality')) == 'Tajikistan' ? 'selected' : '' }}>
                                    @lang('Tajikistan')</option>
                                <option value="Tanzania"
                                    {{ old('nationality', session('nationality')) == 'Tanzania' ? 'selected' : '' }}>
                                    @lang('Tanzania')</option>
                                <option value="Thailand"
                                    {{ old('nationality', session('nationality')) == 'Thailand' ? 'selected' : '' }}>
                                    @lang('Thailand')</option>
                                <option value="Timor-Leste"
                                    {{ old('nationality', session('nationality')) == 'Timor-Leste' ? 'selected' : '' }}>
                                    @lang('Timor-Leste')</option>
                                <option value="Togo"
                                    {{ old('nationality', session('nationality')) == 'Togo' ? 'selected' : '' }}>
                                    @lang('Togo')</option>
                                <option value="Tonga"
                                    {{ old('nationality', session('nationality')) == 'Tonga' ? 'selected' : '' }}>
                                    @lang('Tonga')</option>
                                <option value="Trinidad and Tobago"
                                    {{ old('nationality', session('nationality')) == 'Trinidad and Tobago' ? 'selected' : '' }}>
                                    @lang('Trinidad and Tobago')</option>
                                <option value="Tunisia"
                                    {{ old('nationality', session('nationality')) == 'Tunisia' ? 'selected' : '' }}>
                                    @lang('Tunisia')</option>
                                <option value="Turkey"
                                    {{ old('nationality', session('nationality')) == 'Turkey' ? 'selected' : '' }}>
                                    @lang('Turkey')</option>
                                <option value="Turkmenistan"
                                    {{ old('nationality', session('nationality')) == 'Turkmenistan' ? 'selected' : '' }}>
                                    @lang('Turkmenistan')</option>
                                <option value="Tuvalu"
                                    {{ old('nationality', session('nationality')) == 'Tuvalu' ? 'selected' : '' }}>
                                    @lang('Tuvalu')</option>
                                <option value="Uganda"
                                    {{ old('nationality', session('nationality')) == 'Uganda' ? 'selected' : '' }}>
                                    @lang('Uganda')</option>
                                <option value="Ukraine"
                                    {{ old('nationality', session('nationality')) == 'Ukraine' ? 'selected' : '' }}>
                                    @lang('Ukraine')</option>
                                <option value="United Arab Emirates"
                                    {{ old('nationality', session('nationality')) == 'United Arab Emirates' ? 'selected' : '' }}>
                                    @lang('United Arab Emirates')</option>
                                <option value="United Kingdom"
                                    {{ old('nationality', session('nationality')) == 'United Kingdom' ? 'selected' : '' }}>
                                    @lang('United Kingdom')</option>
                                <option value="United States"
                                    {{ old('nationality', session('nationality')) == 'United States' ? 'selected' : '' }}>
                                    @lang('United States')</option>
                                <option value="Uruguay"
                                    {{ old('nationality', session('nationality')) == 'Uruguay' ? 'selected' : '' }}>
                                    @lang('Uruguay')</option>
                                <option value="Uzbekistan"
                                    {{ old('nationality', session('nationality')) == 'Uzbekistan' ? 'selected' : '' }}>
                                    @lang('Uzbekistan')</option>
                                <option value="Vanuatu"
                                    {{ old('nationality', session('nationality')) == 'Vanuatu' ? 'selected' : '' }}>
                                    @lang('Vanuatu')</option>
                                <option value="Vatican City"
                                    {{ old('nationality', session('nationality')) == 'Vatican City' ? 'selected' : '' }}>
                                    @lang('Vatican City')</option>
                                <option value="Venezuela"
                                    {{ old('nationality', session('nationality')) == 'Venezuela' ? 'selected' : '' }}>
                                    @lang('Venezuela')</option>
                                <option value="Vietnam"
                                    {{ old('nationality', session('nationality')) == 'Vietnam' ? 'selected' : '' }}>
                                    @lang('Vietnam')</option>
                                <option value="Yemen"
                                    {{ old('nationality', session('nationality')) == 'Yemen' ? 'selected' : '' }}>
                                    @lang('Yemen')</option>
                                <option value="Zambia"
                                    {{ old('nationality', session('nationality')) == 'Zambia' ? 'selected' : '' }}>
                                    @lang('Zambia')</option>
                                <option value="Zimbabwe"
                                    {{ old('nationality', session('nationality')) == 'Zimbabwe' ? 'selected' : '' }}>
                                    @lang('Zimbabwe')</option>
                            </select>
                            <div class="text-orange-600 hover:text-orange-700 font-medium">
                                @error('nationality')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">@lang('Save changes')</button>
                    <button type="reset" class="btn btn-outline-secondary">@lang('Cancel')</button>
                </div>
            </form>
        </div>
        <!-- /Account -->
    </div>
    @livewire('admin.account.delete-account')
</div>
