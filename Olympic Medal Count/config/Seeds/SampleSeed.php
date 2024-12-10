<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Sample seed.
 */
class SampleSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $urlCountryFlag = \Cake\Core\Configure::read('ImageSource.countryFlag');
        $countries = [
            [
                'icon' => $urlCountryFlag . "/AFG.png",
                'name' => 'Afghanistan'
            ],
            [
                'icon' => $urlCountryFlag . "/ALB.png",
                'name' => 'Albania'
            ],
            [
                'icon' => $urlCountryFlag . "/ALG.png",
                'name' => 'Algeria'
            ],
            [
                'icon' => $urlCountryFlag . "/ASA.png",
                'name' => 'American Samoa'
            ],
            [
                'icon' => $urlCountryFlag . "/AND.png",
                'name' => 'Andorra'
            ],
            [
                'icon' => $urlCountryFlag . "/ANG.png",
                'name' => 'Angola'
            ],
            [
                'icon' => $urlCountryFlag . "/ANT.png",
                'name' => 'Antigua and Barbuda'
            ],
            [
                'icon' => $urlCountryFlag . "/ARG.png",
                'name' => 'Argentina'
            ],
            [
                'icon' => $urlCountryFlag . "/ARM.png",
                'name' => 'Armenia'
            ],
            [
                'icon' => $urlCountryFlag . "/ARU.png",
                'name' => 'Aruba'
            ],
            [
                'icon' => $urlCountryFlag . "/AUS.png",
                'name' => 'Australia'
            ],
            [
                'icon' => $urlCountryFlag . "/AUT.png",
                'name' => 'Austria'
            ],
            [
                'icon' => $urlCountryFlag . "/AZE.png",
                'name' => 'Azerbaijan'
            ],
            [
                'icon' => $urlCountryFlag . "/BAH.png",
                'name' => 'Bahamas'
            ],
            [
                'icon' => $urlCountryFlag . "/BRN.png",
                'name' => 'Bahrain'
            ],
            [
                'icon' => $urlCountryFlag . "/BAN.png",
                'name' => 'Bangladesh'
            ],
            [
                'icon' => $urlCountryFlag . "/BAR.png",
                'name' => 'Barbados'
            ],
            [
                'icon' => $urlCountryFlag . "/BLR.png",
                'name' => 'Belarus'
            ],
            [
                'icon' => $urlCountryFlag . "/BEL.png",
                'name' => 'Belgium'
            ],
            [
                'icon' => $urlCountryFlag . "/BIZ.png",
                'name' => 'Belize'
            ],
            [
                'icon' => $urlCountryFlag . "/BEN.png",
                'name' => 'Benin'
            ],
            [
                'icon' => $urlCountryFlag . "/BER.png",
                'name' => 'Bermuda'
            ],
            [
                'icon' => $urlCountryFlag . "/BHU.png",
                'name' => 'Bhutan'
            ],
            [
                'icon' => $urlCountryFlag . "/BOL.png",
                'name' => 'Bolivia'
            ],
            [
                'icon' => $urlCountryFlag . "/BIH.png",
                'name' => 'Bosnia and Herzegovina'
            ],
            [
                'icon' => $urlCountryFlag . "/BOT.png",
                'name' => 'Botswana'
            ],
            [
                'icon' => $urlCountryFlag . "/BRA.png",
                'name' => 'Brazil'
            ],
            [
                'icon' => $urlCountryFlag . "/BRU.png",
                'name' => 'Brunei Darussalam'
            ],
            [
                'icon' => $urlCountryFlag . "/BUL.png",
                'name' => 'Bulgaria'
            ],
            [
                'icon' => $urlCountryFlag . "/BUR.png",
                'name' => 'Burkina Faso'
            ],
            [
                'icon' => $urlCountryFlag . "/BDI.png",
                'name' => 'Burundi'
            ],
            [
                'icon' => $urlCountryFlag . "/CAM.png",
                'name' => 'Cambodia'
            ],
            [
                'icon' => $urlCountryFlag . "/CMR.png",
                'name' => 'Cameroon'
            ],
            [
                'icon' => $urlCountryFlag . "/CAN.png",
                'name' => 'Canada'
            ],
            [
                'icon' => $urlCountryFlag . "/CPV.png",
                'name' => 'Cape Verde'
            ],
            [
                'icon' => $urlCountryFlag . "/CAY.png",
                'name' => 'Cayman Islands'
            ],
            [
                'icon' => $urlCountryFlag . "/CAF.png",
                'name' => 'Central African Republic'
            ],
            [
                'icon' => $urlCountryFlag . "/CHA.png",
                'name' => 'Chad'
            ],
            [
                'icon' => $urlCountryFlag . "/CHI.png",
                'name' => 'Chile'
            ],
            [
                'icon' => $urlCountryFlag . "/TPE.png",
                'name' => 'Chinese Taipei'
            ],
            [
                'icon' => $urlCountryFlag . "/COL.png",
                'name' => 'Colombia'
            ],
            [
                'icon' => $urlCountryFlag . "/COM.png",
                'name' => 'Comoros'
            ],
            [
                'icon' => $urlCountryFlag . "/CGO.png",
                'name' => 'Congo'
            ],
            [
                'icon' => $urlCountryFlag . "/COK.png",
                'name' => 'Cook Islands'
            ],
            [
                'icon' => $urlCountryFlag . "/CRC.png",
                'name' => 'Costa Rica'
            ],
            [
                'icon' => $urlCountryFlag . "/CIV.png",
                'name' => 'Côte d\'Ivoire'
            ],
            [
                'icon' => $urlCountryFlag . "/CRO.png",
                'name' => 'Croatia'
            ],
            [
                'icon' => $urlCountryFlag . "/CUB.png",
                'name' => 'Cuba'
            ],
            [
                'icon' => $urlCountryFlag . "/CYP.png",
                'name' => 'Cyprus'
            ],
            [
                'icon' => $urlCountryFlag . "/CZE.png",
                'name' => 'Czech Republic'
            ],
            [
                'icon' => $urlCountryFlag . "/COD.png",
                'name' => 'Democratic Republic of the Congo'
            ],
            [
                'icon' => $urlCountryFlag . "/TLS.png",
                'name' => 'Democratic Republic of Timor-Leste'
            ],
            [
                'icon' => $urlCountryFlag . "/DEN.png",
                'name' => 'Denmark'
            ],
            [
                'icon' => $urlCountryFlag . "/DJI.png",
                'name' => 'Djibouti'
            ],
            [
                'icon' => $urlCountryFlag . "/DMA.png",
                'name' => 'Dominica'
            ],
            [
                'icon' => $urlCountryFlag . "/DOM.png",
                'name' => 'Dominican Republic'
            ],
            [
                'icon' => $urlCountryFlag . "/ECU.png",
                'name' => 'Ecuador'
            ],
            [
                'icon' => $urlCountryFlag . "/EGY.png",
                'name' => 'Egypt'
            ],
            [
                'icon' => $urlCountryFlag . "/ESA.png",
                'name' => 'El Salvador'
            ],
            [
                'icon' => $urlCountryFlag . "/GEQ.png",
                'name' => 'Equatorial Guinea'
            ],
            [
                'icon' => $urlCountryFlag . "/ERI.png",
                'name' => 'Eritrea'
            ],
            [
                'icon' => $urlCountryFlag . "/EST.png",
                'name' => 'Estonia'
            ],
            [
                'icon' => $urlCountryFlag . "/SWZ.png",
                'name' => 'Eswatini'
            ],
            [
                'icon' => $urlCountryFlag . "/ETH.png",
                'name' => 'Ethiopia'
            ],
            [
                'icon' => $urlCountryFlag . "/FSM.png",
                'name' => 'Federated States of Micronesia'
            ],
            [
                'icon' => $urlCountryFlag . "/FIJ.png",
                'name' => 'Fiji'
            ],
            [
                'icon' => $urlCountryFlag . "/FIN.png",
                'name' => 'Finland'
            ],
            [
                'icon' => $urlCountryFlag . "/FRA.png",
                'name' => 'France'
            ],
            [
                'icon' => $urlCountryFlag . "/GAB.png",
                'name' => 'Gabon'
            ],
            [
                'icon' => $urlCountryFlag . "/GAM.png",
                'name' => 'Gambia'
            ],
            [
                'icon' => $urlCountryFlag . "/GEO.png",
                'name' => 'Georgia'
            ],
            [
                'icon' => $urlCountryFlag . "/GER.png",
                'name' => 'Germany'
            ],
            [
                'icon' => $urlCountryFlag . "/GHA.png",
                'name' => 'Ghana'
            ],
            [
                'icon' => $urlCountryFlag . "/GBR.png",
                'name' => 'Great Britain'
            ],
            [
                'icon' => $urlCountryFlag . "/GRE.png",
                'name' => 'Greece'
            ],
            [
                'icon' => $urlCountryFlag . "/GRN.png",
                'name' => 'Grenada'
            ],
            [
                'icon' => $urlCountryFlag . "/GUM.png",
                'name' => 'Guam'
            ],
            [
                'icon' => $urlCountryFlag . "/GUA.png",
                'name' => 'Guatemala'
            ],
            [
                'icon' => $urlCountryFlag . "/GUI.png",
                'name' => 'Guinea'
            ],
            [
                'icon' => $urlCountryFlag . "/GBS.png",
                'name' => 'Guinea-Bissau'
            ],
            [
                'icon' => $urlCountryFlag . "/GUY.png",
                'name' => 'Guyana'
            ],
            [
                'icon' => $urlCountryFlag . "/HAI.png",
                'name' => 'Haiti'
            ],
            [
                'icon' => $urlCountryFlag . "/HON.png",
                'name' => 'Honduras'
            ],
            [
                'icon' => $urlCountryFlag . "/HKG.png",
                'name' => 'Hong Kong, China'
            ],
            [
                'icon' => $urlCountryFlag . "/HUN.png",
                'name' => 'Hungary'
            ],
            [
                'icon' => $urlCountryFlag . "/ISL.png",
                'name' => 'Iceland'
            ],
            [
                'icon' => $urlCountryFlag . "/IND.png",
                'name' => 'India'
            ],
            [
                'icon' => $urlCountryFlag . "/INA.png",
                'name' => 'Indonesia'
            ],
            [
                'icon' => $urlCountryFlag . "/IRQ.png",
                'name' => 'Iraq'
            ],
            [
                'icon' => $urlCountryFlag . "/IRL.png",
                'name' => 'Ireland'
            ],
            [
                'icon' => $urlCountryFlag . "/IRI.png",
                'name' => 'Islamic Republic of Iran'
            ],
            [
                'icon' => $urlCountryFlag . "/ISR.png",
                'name' => 'Israel'
            ],
            [
                'icon' => $urlCountryFlag . "/ITA.png",
                'name' => 'Italy'
            ],
            [
                'icon' => $urlCountryFlag . "/JAM.png",
                'name' => 'Jamaica'
            ],
            [
                'icon' => $urlCountryFlag . "/JPN.png",
                'name' => 'Japan'
            ],
            [
                'icon' => $urlCountryFlag . "/JOR.png",
                'name' => 'Jordan'
            ],
            [
                'icon' => $urlCountryFlag . "/KAZ.png",
                'name' => 'Kazakhstan'
            ],
            [
                'icon' => $urlCountryFlag . "/KEN.png",
                'name' => 'Kenya'
            ],
            [
                'icon' => $urlCountryFlag . "/KIR.png",
                'name' => 'Kiribati'
            ],
            [
                'icon' => $urlCountryFlag . "/KOS.png",
                'name' => 'Kosovo'
            ],
            [
                'icon' => $urlCountryFlag . "/KUW.png",
                'name' => 'Kuwait'
            ],
            [
                'icon' => $urlCountryFlag . "/KGZ.png",
                'name' => 'Kyrgyzstan'
            ],
            [
                'icon' => $urlCountryFlag . "/LAO.png",
                'name' => 'Lao People\'s Democratic Republic'
            ],
            [
                'icon' => $urlCountryFlag . "/LAT.png",
                'name' => 'Latvia'
            ],
            [
                'icon' => $urlCountryFlag . "/LBN.png",
                'name' => 'Lebanon'
            ],
            [
                'icon' => $urlCountryFlag . "/LES.png",
                'name' => 'Lesotho'
            ],
            [
                'icon' => $urlCountryFlag . "/LBR.png",
                'name' => 'Liberia'
            ],
            [
                'icon' => $urlCountryFlag . "/LBA.png",
                'name' => 'Libya'
            ],
            [
                'icon' => $urlCountryFlag . "/LIE.png",
                'name' => 'Liechtenstein'
            ],
            [
                'icon' => $urlCountryFlag . "/LTU.png",
                'name' => 'Lithuania'
            ],
            [
                'icon' => $urlCountryFlag . "/LUX.png",
                'name' => 'Luxembourg'
            ],
            [
                'icon' => $urlCountryFlag . "/MAD.png",
                'name' => 'Madagascar'
            ],
            [
                'icon' => $urlCountryFlag . "/MAW.png",
                'name' => 'Malawi'
            ],
            [
                'icon' => $urlCountryFlag . "/MAS.png",
                'name' => 'Malaysia'
            ],
            [
                'icon' => $urlCountryFlag . "/MDV.png",
                'name' => 'Maldives'
            ],
            [
                'icon' => $urlCountryFlag . "/MLI.png",
                'name' => 'Mali'
            ],
            [
                'icon' => $urlCountryFlag . "/MLT.png",
                'name' => 'Malta'
            ],
            [
                'icon' => $urlCountryFlag . "/MHL.png",
                'name' => 'Marshall Islands'
            ],
            [
                'icon' => $urlCountryFlag . "/MTN.png",
                'name' => 'Mauritania'
            ],
            [
                'icon' => $urlCountryFlag . "/MRI.png",
                'name' => 'Mauritius'
            ],
            [
                'icon' => $urlCountryFlag . "/MEX.png",
                'name' => 'Mexico'
            ],
            [
                'icon' => $urlCountryFlag . "/MON.png",
                'name' => 'Monaco'
            ],
            [
                'icon' => $urlCountryFlag . "/MGL.png",
                'name' => 'Mongolia'
            ],
            [
                'icon' => $urlCountryFlag . "/MNE.png",
                'name' => 'Montenegro'
            ],
            [
                'icon' => $urlCountryFlag . "/MAR.png",
                'name' => 'Morocco'
            ],
            [
                'icon' => $urlCountryFlag . "/MOZ.png",
                'name' => 'Mozambique'
            ],
            [
                'icon' => $urlCountryFlag . "/MYA.png",
                'name' => 'Myanmar'
            ],
            [
                'icon' => $urlCountryFlag . "/NAM.png",
                'name' => 'Namibia'
            ],
            [
                'icon' => $urlCountryFlag . "/NRU.png",
                'name' => 'Nauru'
            ],
            [
                'icon' => $urlCountryFlag . "/NEP.png",
                'name' => 'Nepal'
            ],
            [
                'icon' => $urlCountryFlag . "/NED.png",
                'name' => 'Netherlands'
            ],
            [
                'icon' => $urlCountryFlag . "/NZL.png",
                'name' => 'New Zealand'
            ],
            [
                'icon' => $urlCountryFlag . "/NCA.png",
                'name' => 'Nicaragua'
            ],
            [
                'icon' => $urlCountryFlag . "/NIG.png",
                'name' => 'Niger'
            ],
            [
                'icon' => $urlCountryFlag . "/NGR.png",
                'name' => 'Nigeria'
            ],
            [
                'icon' => $urlCountryFlag . "/MKD.png",
                'name' => 'North Macedonia'
            ],
            [
                'icon' => $urlCountryFlag . "/NOR.png",
                'name' => 'Norway'
            ],
            [
                'icon' => $urlCountryFlag . "/OMA.png",
                'name' => 'Oman'
            ],
            [
                'icon' => $urlCountryFlag . "/PAK.png",
                'name' => 'Pakistan'
            ],
            [
                'icon' => $urlCountryFlag . "/PLW.png",
                'name' => 'Palau'
            ],
            [
                'icon' => $urlCountryFlag . "/PLE.png",
                'name' => 'Palestine'
            ],
            [
                'icon' => $urlCountryFlag . "/PAN.png",
                'name' => 'Panama'
            ],
            [
                'icon' => $urlCountryFlag . "/PNG.png",
                'name' => 'Papua New Guinea'
            ],
            [
                'icon' => $urlCountryFlag . "/PAR.png",
                'name' => 'Paraguay'
            ],
            [
                'icon' => $urlCountryFlag . "/CHN.png",
                'name' => 'People\'s Republic of China'
            ],
            [
                'icon' => $urlCountryFlag . "/PER.png",
                'name' => 'Peru'
            ],
            [
                'icon' => $urlCountryFlag . "/PHI.png",
                'name' => 'Philippines'
            ],
            [
                'icon' => $urlCountryFlag . "/POL.png",
                'name' => 'Poland'
            ],
            [
                'icon' => $urlCountryFlag . "/POR.png",
                'name' => 'Portugal'
            ],
            [
                'icon' => $urlCountryFlag . "/PUR.png",
                'name' => 'Puerto Rico'
            ],
            [
                'icon' => $urlCountryFlag . "/QAT.png",
                'name' => 'Qatar'
            ],
            [
                'icon' => $urlCountryFlag . "/EOR.png",
                'name' => 'Refugee Olympic Team'
            ],
            [
                'icon' => $urlCountryFlag . "/KOR.png",
                'name' => 'Republic of Korea'
            ],
            [
                'icon' => $urlCountryFlag . "/MDA.png",
                'name' => 'Republic of Moldova'
            ],
            [
                'icon' => $urlCountryFlag . "/ROC.png",
                'name' => 'ROC'
            ],
            [
                'icon' => $urlCountryFlag . "/ROU.png",
                'name' => 'Romania'
            ],
            [
                'icon' => $urlCountryFlag . "/RWA.png",
                'name' => 'Rwanda'
            ],
            [
                'icon' => $urlCountryFlag . "/SKN.png",
                'name' => 'Saint Kitts and Nevis'
            ],
            [
                'icon' => $urlCountryFlag . "/LCA.png",
                'name' => 'Saint Lucia'
            ],
            [
                'icon' => $urlCountryFlag . "/SAM.png",
                'name' => 'Samoa'
            ],
            [
                'icon' => $urlCountryFlag . "/SMR.png",
                'name' => 'San Marino'
            ],
            [
                'icon' => $urlCountryFlag . "/STP.png",
                'name' => 'Sao Tome and Principe'
            ],
            [
                'icon' => $urlCountryFlag . "/KSA.png",
                'name' => 'Saudi Arabia'
            ],
            [
                'icon' => $urlCountryFlag . "/SEN.png",
                'name' => 'Senegal'
            ],
            [
                'icon' => $urlCountryFlag . "/SRB.png",
                'name' => 'Serbia'
            ],
            [
                'icon' => $urlCountryFlag . "/SEY.png",
                'name' => 'Seychelles'
            ],
            [
                'icon' => $urlCountryFlag . "/SLE.png",
                'name' => 'Sierra Leone'
            ],
            [
                'icon' => $urlCountryFlag . "/SGP.png",
                'name' => 'Singapore'
            ],
            [
                'icon' => $urlCountryFlag . "/SVK.png",
                'name' => 'Slovakia'
            ],
            [
                'icon' => $urlCountryFlag . "/SLO.png",
                'name' => 'Slovenia'
            ],
            [
                'icon' => $urlCountryFlag . "/SOL.png",
                'name' => 'Solomon Islands'
            ],
            [
                'icon' => $urlCountryFlag . "/SOM.png",
                'name' => 'Somalia'
            ],
            [
                'icon' => $urlCountryFlag . "/RSA.png",
                'name' => 'South Africa'
            ],
            [
                'icon' => $urlCountryFlag . "/SSD.png",
                'name' => 'South Sudan'
            ],
            [
                'icon' => $urlCountryFlag . "/ESP.png",
                'name' => 'Spain'
            ],
            [
                'icon' => $urlCountryFlag . "/SRI.png",
                'name' => 'Sri Lanka'
            ],
            [
                'icon' => $urlCountryFlag . "/VIN.png",
                'name' => 'St Vincent and the Grenadines'
            ],
            [
                'icon' => $urlCountryFlag . "/SUD.png",
                'name' => 'Sudan'
            ],
            [
                'icon' => $urlCountryFlag . "/SUR.png",
                'name' => 'Suriname'
            ],
            [
                'icon' => $urlCountryFlag . "/SWE.png",
                'name' => 'Sweden'
            ],
            [
                'icon' => $urlCountryFlag . "/SUI.png",
                'name' => 'Switzerland'
            ],
            [
                'icon' => $urlCountryFlag . "/SYR.png",
                'name' => 'Syrian Arab Republic'
            ],
            [
                'icon' => $urlCountryFlag . "/TJK.png",
                'name' => 'Tajikistan'
            ],
            [
                'icon' => $urlCountryFlag . "/THA.png",
                'name' => 'Thailand'
            ],
            [
                'icon' => $urlCountryFlag . "/TOG.png",
                'name' => 'Togo'
            ],
            [
                'icon' => $urlCountryFlag . "/TGA.png",
                'name' => 'Tonga'
            ],
            [
                'icon' => $urlCountryFlag . "/TTO.png",
                'name' => 'Trinidad and Tobago'
            ],
            [
                'icon' => $urlCountryFlag . "/TUN.png",
                'name' => 'Tunisia'
            ],
            [
                'icon' => $urlCountryFlag . "/TUR.png",
                'name' => 'Turkey'
            ],
            [
                'icon' => $urlCountryFlag . "/TKM.png",
                'name' => 'Turkmenistan'
            ],
            [
                'icon' => $urlCountryFlag . "/TUV.png",
                'name' => 'Tuvalu'
            ],
            [
                'icon' => $urlCountryFlag . "/UGA.png",
                'name' => 'Uganda'
            ],
            [
                'icon' => $urlCountryFlag . "/UKR.png",
                'name' => 'Ukraine'
            ],
            [
                'icon' => $urlCountryFlag . "/UAE.png",
                'name' => 'United Arab Emirates'
            ],
            [
                'icon' => $urlCountryFlag . "/TAN.png",
                'name' => 'United Republic of Tanzania'
            ],
            [
                'icon' => $urlCountryFlag . "/USA.png",
                'name' => 'United States of America'
            ],
            [
                'icon' => $urlCountryFlag . "/URU.png",
                'name' => 'Uruguay'
            ],
            [
                'icon' => $urlCountryFlag . "/UZB.png",
                'name' => 'Uzbekistan'
            ],
            [
                'icon' => $urlCountryFlag . "/VAN.png",
                'name' => 'Vanuatu'
            ],
            [
                'icon' => $urlCountryFlag . "/VEN.png",
                'name' => 'Venezuela'
            ],
            [
                'icon' => $urlCountryFlag . "/VIE.png",
                'name' => 'Vietnam'
            ],
            [
                'icon' => $urlCountryFlag . "/IVB.png",
                'name' => 'Virgin Islands, British'
            ],
            [
                'icon' => $urlCountryFlag . "/ISV.png",
                'name' => 'Virgin Islands, US'
            ],
            [
                'icon' => $urlCountryFlag . "/YEM.png",
                'name' => 'Yemen'
            ],
            [
                'icon' => $urlCountryFlag . "/ZAM.png",
                'name' => 'Zambia'
            ],
            [
                'icon' => $urlCountryFlag . "/ZIM.png",
                'name' => 'Zimbabwe'
            ],
        ];

        $table = $this->table('countries');
        $table->insert($countries)->save();

        $sports = [
            [
                'name' => '3x3 Basketball',
            ],
            [
                'name' => 'Archery',
            ],
            [
                'name' => 'Artistic Gymnastics',
            ],
            [
                'name' => 'Artistic Swimming',
            ],
            [
                'name' => 'Athletics',
            ],
            [
                'name' => 'Badminton',
            ],
            [
                'name' => 'Baseball/Softball',
            ],
            [
                'name' => 'Basketball',
            ],
            [
                'name' => 'Beach Volleyball',
            ],
            [
                'name' => 'Boxing',
            ],
            [
                'name' => 'Canoe Slalom',
            ],
            [
                'name' => 'Canoe Sprint',
            ],
            [
                'name' => 'Cycling BMX Freestyle',
            ],
            [
                'name' => 'Cycling BMX Racing',
            ],
            [
                'name' => 'Cycling Mountain Bike',
            ],
            [
                'name' => 'Cycling Road',
            ],
            [
                'name' => 'Cycling Track',
            ],
            [
                'name' => 'Diving',
            ],
            [
                'name' => 'Equestrian',
            ],
            [
                'name' => 'Fencing',
            ],
            [
                'name' => 'Football',
            ],
            [
                'name' => 'Golf',
            ],
            [
                'name' => 'Handball',
            ],
            [
                'name' => 'Hockey',
            ],
            [
                'name' => 'Judo',
            ],
            [
                'name' => 'Karate',
            ],
            [
                'name' => 'Marathon Swimming',
            ],
            [
                'name' => 'Modern Pentathlon',
            ],
            [
                'name' => 'Rhythmic Gymnastics',
            ],
            [
                'name' => 'Rowing',
            ],
            [
                'name' => 'Rugby Sevens',
            ],
            [
                'name' => 'Sailing',
            ],
            [
                'name' => 'Shooting',
            ],
            [
                'name' => 'Skateboarding',
            ],
            [
                'name' => 'Sport Climbing',
            ],
            [
                'name' => 'Surfing',
            ],
            [
                'name' => 'Swimming',
            ],
            [
                'name' => 'Table Tennis',
            ],
            [
                'name' => 'Taekwondo',
            ],
            [
                'name' => 'Tennis',
            ],
            [
                'name' => 'Trampoline Gymnastics',
            ],
            [
                'name' => 'Triathlon',
            ],
            [
                'name' => 'Volleyball',
            ],
            [
                'name' => 'Water Polo',
            ],
            [
                'name' => 'Weightlifting',
            ],
            [
                'name' => 'Wrestling',
            ],
        ];
        $table = $this->table('sports');
        $table->insert($sports)->save();
    }
}
