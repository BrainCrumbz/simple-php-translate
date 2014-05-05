# WebShowCase Local Dev Workstation Services START script
#
# Created by Giuseppe Piscopo (g.piscopo@braincrumbz.com) on 15 October 2012
#

# Include needed script
$scriptDirectoryPath = Split-Path -parent $MyInvocation.MyCommand.Definition
$scriptFileName = "Start-Service-WithLog.ps1"
. (Join-Path $scriptDirectoryPath $scriptFileName)


$serviceTitle = "Local IIS"
"*** Starting $serviceTitle ***"
$serviceName = 'W3SVC'
Start-Service-WithLog $serviceName
"=> $serviceTitle Started"
" "

$siteTitle = "Local Showcase Website"
"*** Starting $siteTitle ***"
Import-Module WebAdministration
# Avvia il sito vetrina locale
Get-Website | Where-Object {$_.Name -like "*WebShowCase*" } | ForEach-Object { Start-Website -Name $_.Name }
"=> $siteTitle Started"
" "

$wait = 3
"Waiting $wait seconds before closing..."
Start-Sleep -s $wait
