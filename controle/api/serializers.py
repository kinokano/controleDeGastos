from rest_framework import serializers

from .models import CustomUser, Gastos

class UserSerializer(serializers.ModelSerializer):
    class Meta:
        model = CustomUser
        fields = '__all__'
    
class GastosSerializer(serializers.ModelSerializer):
    class Meta: 
        model = Gastos
        fields = '__all__'
