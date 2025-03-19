from django.urls import path, include

from api.views.apiViews import *
from api.views.webViews import *
from rest_framework.routers import DefaultRouter



urlpatterns = [
    path('', index, name='index'),
    path('api/user/', User.as_view(), name='usuarios'),
    path('api/login/', Login.as_view(), name='login'),
    path('api/GetDadosUsuarioLogado', GetDadosUsuarioLogado.as_view(), name='GetDadosUsuarioLogado'),
    path('home/', home, name='home'),
    path('cadastrar/', cadastrar, name='cadastrar'),
]