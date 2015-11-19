<?php

# Copyright 2015 Julian Ospald <hasufell@hasufell.de>
#
# Permission is hereby granted, free of charge, to any person
# obtaining a copy of this software and associated documentation files
# (the "Software"), to deal in the Software without restriction,
# including without limitation the rights to use, copy, modify, merge,
# publish, distribute, sublicense, and/or sell copies of the Software,
# and to permit persons to whom the Software is furnished to do so,
# subject to the following conditions:
#
# The above copyright notice and this permission notice shall be
# included in all copies or substantial portions of the Software.
#
# THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
# EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
# MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
# NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
# LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
# OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
# WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

/**
 * A set of classes to abstract out the properties of various iCalendar
 * components
 *
 * Also see the specification @link http://www.kanzaki.com/docs/ical/
 *
 * @package iCal
 * @author Julian Ospald <hasufell@hasufell.de>
 * @copyright MIT
 */

/**
 * Abstract interface class for iCalendar properties
 */
abstract class iCal_properties {

}

/**
 * Class representing the properties for the "VCALENDAR" component
 */
class vcalendar_properties extends iCal_properties
{
    protected $version  = "";
    protected $method   = "";
    protected $prodid   = "";
    protected $calname  = "";
    protected $caldesc  = "";
    protected $calcolor = "";
    protected $timezone = "";
    protected $calscale = "";

    function __toString()
    {
        return "VERSION:"                .$this->version.  "\n".
               "METHOD:"                 .$this->method.   "\n".
               "PRODID:"                 .$this->prodid.   "\n".
               "X-WR-CALNAME:"           .$this->calname.  "\n".
               "X-WR-CALDESC:"           .$this->caldesc.  "\n".
               "X-APPLE-CALENDAR-COLOR:" .$this->calcolor. "\n".
               "X-WR-TIMEZONE:"          .$this->timezone. "\n";
    }

    function __construct($version, $method, $prodid, $calname,
            $caldesc, $calcolor, $timezone, $calscale)
    {
        $this->version  = $version;
        $this->method   = $method;
        $this->prodid   = $prodid;
        $this->calname  = $calname;
        $this->caldesc  = $caldesc;
        $this->calcolor = $calcolor;
        $this->timezone = $timezone;
        $this->calscale = $calscale;
    }
}

/**
 * Class representing the properties for the "VEVENT" component
 */
class vevent_properties extends iCal_properties
{
    protected $uid         = "";
    protected $dtstart     = "";
    protected $dtend       = "";
    protected $summary     = "";
    protected $description = "";
    protected $dtstamp     = "";

    function __toString()
    {
        return "UID:"         .$this->uid.         "\n".
               "DTSTART:"     .$this->dtstart.     "\n".
               "DTEND:"       .$this->dtend.       "\n".
               "SUMMARY:"     .$this->summary.     "\n".
               "DESCRIPTION:" .$this->description. "\n".
               "DTSTAMP:"     .$this->dtstamp.     "\n";
    }

    function __construct($uid, $dtstart, $dtend, $summary,
            $description, $dtstamp)
    {
        $this->uid         = $uid;
        $this->dtstart     = $dtstart;
        $this->dtend       = $dtend;
        $this->summary     = $summary;
        $this->description = $description;
        $this->dtstamp     = $dtstamp;
    }
}

/**
 * Class representing the properties for the "VTIMEZONE" component
 */
class vtimezone_properties extends iCal_properties
{
    protected $tzid = "";

    function __toString()
    {
        return "TZID:" .$this->tzid. "\n";
    }

    function __construct($tzid)
    {
        $this->tzid = $tzid;
    }

}

/**
 * Class representing the properties for the "DAYLIGHT" component
 */
class daylight_properties extends iCal_properties
{
    protected $tzoffsetfrom = "";
    protected $tzoffsetto   = "";
    protected $dtstart      = "";
    protected $tzname       = "";

    function __toString()
    {
        return "TZOFFSETFROM:" .$this->tzoffsetfrom. "\n".
               "TZOFFSETTO:"   .$this->tzoffsetto.   "\n".
               "DTSTART:"      .$this->dtstart.      "\n".
               "TZNAME:"       .$this->tzname.       "\n";
    }

    function __construct($tzoffsetfrom, $tzoffsetto, $dtstart, $tzname)
    {
        $this->tzoffsetfrom = $tzoffsetfrom;
        $this->tzoffsetto   = $tzoffsetto;
        $this->dtstart      = $dtstart;
        $this->tzname       = $tzname;
    }
}

/**
 * Class representing the properties for the "STANDARD" component
 */
class standard_properties extends daylight_properties
{

}


// defaults for the properties
$default_vcalendar_properties = new vcalendar_properties(
    "", "", "", "", "", "", "", "");
$default_vevent_properties = new vevent_properties(
    "", "", "", "", "", "");
$default_vtimezone_properties = new vtimezone_properties("");
$default_daylight_properties = new daylight_properties("", "", "", "");
$default_standard_properties = new standard_properties("", "", "", "");


?>