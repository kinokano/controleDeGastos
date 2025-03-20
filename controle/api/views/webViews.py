from django.shortcuts import render, redirect
from api.models import *
from django.contrib.auth import logout


def index(request):
    return render(request, 'index.html')

def home(request):
    if not request.user.is_authenticated:
        return redirect('index')

    return render(request, 'home.html')

def cadastrar(request):
    return render(request, 'cadastrar.html')

def logout_view(request):
    logout(request)
    return redirect('index')

def gasto(request):
    return render(request, 'gasto.html')