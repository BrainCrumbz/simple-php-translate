# Created by Giuseppe Piscopo (superjos@libero.it) on 12 Oct 2011

function Stop-Service-WithLog ([string]$serviceName)
{
    $servicePrior = Get-Service $serviceName
    "$serviceName"
    "    is " + $servicePrior.status  + " and will be Stopped"
    
    Stop-Service $serviceName -Force
    
    $serviceAfter = Get-Service $serviceName
    "    is now " + $serviceAfter.status
}
