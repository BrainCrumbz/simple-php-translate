# Created by Giuseppe Piscopo (superjos@libero.it) on 12 Oct 2011

function Start-Service-WithLog ([string]$serviceName)
{
    $servicePrior = Get-Service $serviceName
    "$serviceName"
    "    is " + $servicePrior.status  + " and will be Started"
    
    Start-Service $serviceName
    
    $serviceAfter = Get-Service $serviceName
    "    is now " + $serviceAfter.status
}
