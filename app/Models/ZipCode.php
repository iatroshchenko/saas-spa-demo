<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    const STATE_ALABAMA = "AL";
    const STATE_ALASKA = "AK";
    const STATE_ARIZONA = "AZ";
    const STATE_ARKANSAS = "AR";
    const STATE_CALIFORNIA = "CA";
    const STATE_COLORADO = "CO";
    const STATE_CONNECTICUT = "CT";
    const STATE_DELAWARE = "DE";
    const STATE_DISTRICT_OF_COLUMBIA = "DC";
    const STATE_FLORIDA = "FL";
    const STATE_GEORGIA = "GA";
    const STATE_HAWAII = "HI";
    const STATE_IDAHO = "ID";
    const STATE_ILLINOIS = "IL";
    const STATE_INDIANA = "IN";
    const STATE_IOWA = "IA";
    const STATE_KANSAS = "KS";
    const STATE_KENTUCKY = "KY";
    const STATE_LOUISIANA = "LA";
    const STATE_MAINE = "ME";
    const STATE_MARYLAND = "MD";
    const STATE_MASSACHUSETTS = "MA";
    const STATE_MICHIGAN = "MI";
    const STATE_MINNESOTA = "MN";
    const STATE_MISSISSIPPI = "MS";
    const STATE_MISSOURI = "MO";
    const STATE_MONTANA = "MT";
    const STATE_NEBRASKA = "NE";
    const STATE_NEVADA = "NV";
    const STATE_NEW_HAMPSHIRE = "NH";
    const STATE_NEW_JERSEY = "NJ";
    const STATE_NEW_MEXICO = "NM";
    const STATE_NEW_YORK = "NY";
    const STATE_NORTH_CAROLINA = "NC";
    const STATE_NORTH_DAKOTA = "ND";
    const STATE_OHIO = "OH";
    const STATE_OKLAHOMA = "OK";
    const STATE_OREGON = "OR";
    const STATE_PENNSYLVANIA = "PA";
    const STATE_RHODE_ISLAND = "RI";
    const STATE_SOUTH_CAROLINA = "SC";
    const STATE_SOUTH_DAKOTA = "SD";
    const STATE_TENNESSEE = "TN";
    const STATE_TEXAS = "TX";
    const STATE_UTAH = "UT";
    const STATE_VERMONT = "VT";
    const STATE_VIRGINIA = "VA";
    const STATE_WASHINGTON = "WA";
    const STATE_WEST_VIRGINIA = "WV";
    const STATE_WISCONSIN = "WI";
    const STATE_WYOMING = "WY";

    const STATE_ARMED_FORCES_AMERICA = "AA";
    const STATE_ARMED_FORCES_EUROPE = "AE";
    const STATE_ARMED_FORCES_PACIFIC = "AP";
    const STATE_AMERICAN_SAMOA = "AS";
    const STATE_GUAM = "GU";
    const STATE_NORTHERN_MARIANA_ISLANDS = "MP";
    const STATE_PUERTO_RICO = "PR";
    const STATE_VIRGIN_ISLANDS = "VI";
    const STATE_MICRONESIA = "FM";
    const STATE_MARSHALL_ISLANDS = "MH";
    const STATE_PALAU = "PW";

    const STATE_MAP = [
        self::STATE_ALABAMA => "Alabama",
        self::STATE_ALASKA => "Alaska",
        self::STATE_ARIZONA => "Arizona",
        self::STATE_ARKANSAS => "Arkansas",
        self::STATE_CALIFORNIA => "California",
        self::STATE_COLORADO => "Colorado",
        self::STATE_CONNECTICUT => "Connecticut",
        self::STATE_DELAWARE => "Delaware",
        self::STATE_DISTRICT_OF_COLUMBIA => "D.C. Columbia",
        self::STATE_FLORIDA => "Florida",
        self::STATE_GEORGIA => "Georgia",
        self::STATE_HAWAII => "Hawaii",
        self::STATE_IDAHO => "Idaho",
        self::STATE_ILLINOIS => "Illinois",
        self::STATE_INDIANA => "Indiana",
        self::STATE_IOWA => "Iowa",
        self::STATE_KANSAS => "Kansas",
        self::STATE_KENTUCKY => "Kentucky",
        self::STATE_LOUISIANA => "Louisiana",
        self::STATE_MAINE => "Maine",
        self::STATE_MARYLAND => "Maryland",
        self::STATE_MASSACHUSETTS => "Massachusetts",
        self::STATE_MICHIGAN => "Michigan",
        self::STATE_MINNESOTA => "Minnesota",
        self::STATE_MISSISSIPPI => "Mississippi",
        self::STATE_MISSOURI => "Missouri",
        self::STATE_MONTANA => "Montana",
        self::STATE_NEBRASKA => "Nebraska",
        self::STATE_NEVADA => "Nevada",
        self::STATE_NEW_HAMPSHIRE => "New Hampshire",
        self::STATE_NEW_JERSEY => "New Jersey",
        self::STATE_NEW_MEXICO => "New Mexico",
        self::STATE_NEW_YORK => "New York",
        self::STATE_NORTH_CAROLINA => "North Carolina",
        self::STATE_NORTH_DAKOTA => "North Dakota",
        self::STATE_OHIO => "Ohio",
        self::STATE_OKLAHOMA => "Oklahoma",
        self::STATE_OREGON => "Oregon",
        self::STATE_PENNSYLVANIA => "Pennsylvania",
        self::STATE_RHODE_ISLAND => "Rhode Island",
        self::STATE_SOUTH_CAROLINA => "South Carolina",
        self::STATE_SOUTH_DAKOTA => "South Dakota",
        self::STATE_TENNESSEE => "Tennessee",
        self::STATE_TEXAS => "Texas",
        self::STATE_UTAH => "Utah",
        self::STATE_VERMONT => "Vermont",
        self::STATE_VIRGINIA => "Virginia",
        self::STATE_WASHINGTON => "Washington",
        self::STATE_WEST_VIRGINIA => "West Virginia",
        self::STATE_WISCONSIN => "Wisconsin",
        self::STATE_WYOMING => "Wyoming",

        self::STATE_ARMED_FORCES_AMERICA => "Armed Forces America",
        self::STATE_ARMED_FORCES_EUROPE => "Armed Forces Europe",
        self::STATE_ARMED_FORCES_PACIFIC => "Armed Forces Pacific",
        self::STATE_AMERICAN_SAMOA => "American Samoa",
        self::STATE_GUAM => "Guam",
        self::STATE_NORTHERN_MARIANA_ISLANDS => "Northern Mariana Islands",
        self::STATE_PUERTO_RICO => "Puerto Rico",
        self::STATE_VIRGIN_ISLANDS => "Virgin Islands",
        self::STATE_MICRONESIA => "Micronesia",
        self::STATE_MARSHALL_ISLANDS => "Marshall Islands",
        self::STATE_PALAU => "Palau",
    ];

    public static function stateNames(): array
    {
        return array_values(self::STATE_MAP);
    }

    public static function stateAbbrs(): array
    {
        return array_keys(self::STATE_MAP);
    }

    public function stateUSPStoNames(): array
    {
        return self::STATE_MAP;
    }

    public static function stateNamesToUSPS(): array
    {
        return collect(self::STATE_MAP)
            ->flip()
            ->toArray();
    }

    public function getStateNameAttribute(): string
    {
        return self::STATE_MAP[$this->state];
    }

    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
