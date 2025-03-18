from django.shortcuts import render, redirect
from api.models import *

def index(request):
    return render(request, 'index.html')

def home(request):
    if not request.user.is_authenticated:
        return redirect('index')

    return render(request, 'home.html')
