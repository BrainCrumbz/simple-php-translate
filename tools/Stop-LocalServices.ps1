# WebShowCase Local Dev Workstation Services STOP script
#
# Created by Giuseppe Piscopo (g.piscopo@braincrumbz.com) on 15 October 2012
#

# Include needed script
$scriptDirectoryPath = Split-Path -parent $MyInvocation.MyCommand.Definition
$scriptFileName = "Stop-Service-WithLog.ps1"
. (Join-Path $scriptDirectoryPath $scriptFileName)


$siteTitle = "Local Showcase Website"
"*** Stopping $siteTitle ***"
Import-Module WebAdministration
# Ferma il sito vetrina locale
Get-Website | Where-Object {$_.Name -like "*WebShowCase*" } | ForEach-Object { Stop-Website -Name $_.Name }
"=> $siteTitle Stopped"
" "

$serviceTitle = "Local IIS"
"*** Stopping $serviceTitle ***"
$serviceName = 'W3SVC'
Stop-Service-WithLog $serviceName
iisreset
"=> $serviceTitle Stopped"
" "

$wait = 3
"Waiting $wait seconds before closing..."
Start-Sleep -s $wait
